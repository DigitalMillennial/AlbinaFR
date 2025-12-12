<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public function translationRequests()
{
    return $this->hasMany(TranslationRequest::class);
}
 public function services()
    {
        return $this->hasMany(Service::class);
    }
}
