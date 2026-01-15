<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;      // All users
use App\Models\Course;

class ReportController extends Controller
{
    public function index()
    {
        // Get all users (students) with enrolled courses
        $students = User::with('myCourses.course') // myCourses relationship
                        ->paginate(2);

        return view('backend.reports.index', compact('students'));
    }

    public function show($id)
    {
        // Show a single student with courses
        $student = User::with('myCourses.course')->findOrFail($id);

        return view('backend.reports.show', compact('student'));
    }
}
