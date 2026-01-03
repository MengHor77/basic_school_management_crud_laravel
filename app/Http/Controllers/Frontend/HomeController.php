<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;  
use App\Models\Teacher; 
class HomeController extends Controller
{
     public function index()
    {
        $courses = Course::where('is_active', 1)->get();
        $teachers = Teacher::where('is_active', 1)->get();

        return view('frontend.home.index', compact('courses', 'teachers'));
    }
}
