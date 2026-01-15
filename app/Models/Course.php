<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MyCourse;
use App\Models\User;
use App\Models\Teacher;

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

    // One-to-many: Course has many enrollments
    public function myCourses()
    {
        return $this->hasMany(MyCourse::class);
    }

    // Many-to-many: Course has many students
    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'my_courses', // pivot table
            'course_id',  // FK to courses.id
            'user_id'     // FK to users.id
        )->withPivot('enrolled_date')
         ->withTimestamps();
    }

    // One-to-one: Course belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
