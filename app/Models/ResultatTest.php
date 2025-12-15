<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatTest extends Model
{
    use HasFactory;

    protected $table = 'resultats_test'; // явно указываем таблицу

    protected $fillable = [
        'min',
        'max',
        'niveau',
        'message',
    ];
}
