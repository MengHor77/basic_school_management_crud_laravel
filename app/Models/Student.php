<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $fillable = ['name','gender','age','is_delete'];
   
 public function courses()
    {
        return $this->belongsToMany(Course::class, 'my_courses', 'user_id', 'course_id')
                    ->withPivot('enrolled_date') 
                    ->withTimestamps();
    }

}

