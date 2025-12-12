<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
    ];

    

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function payments() {
    return $this->hasMany(Payment::class);
}

public function lessons() {
    return $this->hasMany(Lesson::class);
}
 public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

}
