<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        Log::info('CheckoutController@create запущен');
        Log::info('Payload запроса', $request->all());

        // Найти или создать студента
        $student = Student::firstOrCreate(
            ['email' => $request->email, 'telephone' => $request->telephone],
            ['nom' => $request->nom, 'prenom' => $request->prenom]
        );

        // Найти курс по course_id
        $course = Course::findOrFail($request->course_id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => ['name' => $course->title],
                        'unit_amount' => (int) round($course->price * 100),
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'metadata' => [
                    'student_id' => $student->id,
                    'course_id'  => $course->id,
                    'group_id'   => $request->group_id, // ✅ добавляем выбранную группу
                ],
            ]);

            Log::info('Stripe Session создан: ' . $session->id);
            return response()->json(['url' => $session->url]);
        } catch (\Throwable $e) {
            Log::error('Ошибка Stripe: ' . $e->getMessage());
            return response()->json(['error' => 'Stripe session failed'], 500);
        }
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            abort(404, 'Session ID missing');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = Session::retrieve($sessionId);
            $studentId = $session->metadata->student_id ?? null;

            if (!$studentId) {
                abort(404, 'Student not found');
            }

            $student = Student::with(['courses','groups'])->find($studentId);

            if (!$student) {
                return view('site.success')->with('message', 'Étudiant introuvable.');
            }

            return view('site.success', compact('student'));
        } catch (\Throwable $e) {
            Log::error('Ошибка при получении Stripe-сессии: ' . $e->getMessage());
            abort(500, 'Erreur lors de la récupération de la session.');
        }
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

    public function webhook(Request $request)
    {
        Log::info('Webhook вызван');

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $secret);
            Log::info('Stripe Webhook Event: ' . $event->type . ', ID: ' . $event->id);
        } catch (\Exception $e) {
            Log::error('Ошибка Stripe Webhook: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            $studentId = $session->metadata->student_id ?? null;
            $courseId  = $session->metadata->course_id ?? null;
            $groupId   = $session->metadata->group_id ?? null; // ✅ читаем group_id
            $amount    = $session->amount_total ?? null;
            $stripeId  = $session->id;

            Log::info('Metadata получена', [
                'student_id' => $studentId,
                'course_id'  => $courseId,
                'group_id'   => $groupId,
                'amount'     => $amount,
            ]);

            if ($studentId && $courseId && $amount) {
                Payment::create([
                    'student_id' => $studentId,
                    'course_id'  => $courseId,
                    'amount'     => $amount / 100,
                    'stripe_id'  => $stripeId,
                    'status'     => 'paid',
                    'paid_at'    => now(),
                ]);

                $student = Student::find($studentId);
                if ($student) {
                    $student->courses()->syncWithoutDetaching([$courseId]);

                    if ($groupId) {
                        $student->groups()->syncWithoutDetaching([$groupId]); // ✅ привязка к группе
                    }
                }

                Log::info("Оплата записана и студент привязан к курсу и группе: student_id={$studentId}, course_id={$courseId}, group_id={$groupId}, amount={$amount}");
            } else {
                Log::warning("checkout.session.completed пришёл без student_id или course_id", (array)$session);
            }
        } else {
            Log::info("Событие {$event->type} проигнорировано");
        }

        return response()->json(['status' => 'success']);
    }
}
