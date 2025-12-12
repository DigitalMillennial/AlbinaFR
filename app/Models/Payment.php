<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'amount',
        'stripe_id',
        'course_id',
        'status',
        'paid_at',
        
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    protected static function boot()
{
    parent::boot();

    static::creating(function ($payment) {
        if ($payment->amount < 0) {
           
            throw new \InvalidArgumentException('Le montant ne peut pas être négatif');
        }
    });
}

}

