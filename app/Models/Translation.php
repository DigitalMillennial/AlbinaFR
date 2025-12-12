<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['group', 'key', 'locale', 'value'];
    public static function getGroupedByGroup($group)
{
    return self::where('group', $group)
        ->get()
        ->groupBy('key');
}

}
