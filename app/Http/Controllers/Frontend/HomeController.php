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
        $courses = Course::all();
        $teachers = Teacher::all();

        return view('frontend.home.index', compact('courses', 'teachers'));
    
    }

}
