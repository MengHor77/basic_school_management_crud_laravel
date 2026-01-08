<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'capacity',
        'is_active',
    ];

    public function myCourses()
    {
        return $this->hasMany(MyCourse::class);
    }
    
  public function students()
    {
        return $this->belongsToMany(
            \App\Models\Student::class,
            'my_courses', // pivot table
            'course_id',  // FK to courses.id
            'user_id'     // FK to students.id
        )->withPivot('enrolled_date')
         ->withTimestamps();
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class);
    }


}