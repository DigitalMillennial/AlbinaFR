<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // app/Models/Course.php
    use HasFactory;
protected $fillable = [
    'niveau',
    'title',
    'price',
    'nb_lessons',
    'is_active',
    'description',
    'programme',
    'icon_class',
    'type',
];

public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    public function groups()
{
    return $this->hasMany(Group::class);
}

}
