<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     public function group()
{
    return $this->belongsTo(Group::class);
}

}
