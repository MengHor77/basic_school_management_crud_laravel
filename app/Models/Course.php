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

    public function teacher()
   {  
      return $this->belongsTo(Teacher::class);
    }
    public function students()
    {
    return $this->belongsToMany(Student::class, 'my_courses', 'course_id', 'user_id')
                ->withPivot('enrolled_date')
                ->withTimestamps();
    }


}