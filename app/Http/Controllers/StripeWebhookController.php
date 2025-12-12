<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        Log::info('Webhook получен и проверен', ['payload' => $event]);

        $object = $event->data->object;

        if ($event->type === 'checkout.session.completed') {

            $studentId = $object->metadata->student_id ?? null;
            $courseId = $object->metadata->course_id ?? null;
            $amount = $object->amount_total / 100 ?? 0; // из центов
            $stripeId = $object->id;

            if (!$studentId || !$courseId) {
                Log::warning("Нет student_id или course_id в metadata, session_id: $stripeId");
                return response('Missing metadata', 400);
            }

            // Создаём запись только если такой Stripe ID ещё не сохранён
            $payment = Payment::firstOrNew(['stripe_id' => $stripeId]);

            $payment->student_id = $studentId;
            $payment->course_id = $courseId;
            $payment->amount = $amount;
            $payment->status = 'paid';
            $payment->paid_at = now();

            $payment->save();

            Log::info("Оплата успешно сохранена в payments, session_id: $stripeId");
        } else {
            Log::info("Необработанное событие Stripe: {$event->type}");
        }

        return response('Webhook processed', 200);
    }
}
