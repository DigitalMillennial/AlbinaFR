<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text_ru', 'text_fr', 'text_en', 'difficulty'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // app/Models/Question.php


// Метод для активного ответа (is_correct = true)
public function activeAnswer()
{
    return $this->hasOne(Answer::class)->where('is_correct', true);
}

}
