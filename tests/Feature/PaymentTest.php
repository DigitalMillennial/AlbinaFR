<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Payment;
use App\Models\Student;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_payment_requires_student_and_amount()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Payment::factory()->create([
            'student_id' => null,
            'amount' => null,
        ]);
    }

    /** @test */
    public function paid_at_can_be_nullable()
    {
        $payment = Payment::factory()->create([
            'paid_at' => null,
        ]);

        $this->assertNull($payment->paid_at);
    }

    /** @test */
    public function a_payment_belongs_to_a_student()
    {
        $student = Student::factory()->create();
        $payment = Payment::factory()->create([
            'student_id' => $student->id,
        ]);

        $this->assertEquals($student->id, $payment->student->id);
    }

    /** @test */
public function amount_cannot_be_negative()
{
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage('Le montant ne peut pas être négatif');

    Payment::factory()->create([
        'amount' => -100,
    ]);
}
}
