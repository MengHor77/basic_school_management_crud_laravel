<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $fillable = ['name','gender','age','is_delete'];
   

       // Many-to-many relationship with Course via my_courses pivot
       
    public function courses()
    {
        return $this->belongsToMany(
            \App\Models\Course::class,
            'my_courses', // pivot table
            'user_id',    // FK to students.id
            'course_id'   // FK to courses.id
        )->withPivot('enrolled_date')
         ->withTimestamps();
    }

}

