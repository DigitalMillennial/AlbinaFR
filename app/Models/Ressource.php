<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    // Явно указываем таблицу, если она уже создана
    protected $table = 'resources'; // или 'ressources', если так называется в БД

    protected $fillable = ['file_path', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
