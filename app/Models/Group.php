<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
protected $fillable = [
        'group_name',
        'course_id',
        'start_date',
        'capacity',
     
    ];

  // app/Models/Group.php
public function students()
{
    return $this->belongsToMany(Student::class, 'group_student');
}

public function scopeAvailable($query)
{
    return $query
        ->where('start_date', '>', now())
        ->withCount('students')
        ->havingRaw('students_count < capacity');
}


public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
public function materials()
{
    return $this->hasMany(Material::class);
}
public function schedules()
{
    return $this->hasMany(GroupSchedule::class);
}

}
