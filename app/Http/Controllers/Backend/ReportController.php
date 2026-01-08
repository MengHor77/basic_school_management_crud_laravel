<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ReportController extends Controller
{
    // Show all students who enrolled in any course
    public function index()
    {
        $students = Student::whereHas('courses')
                           ->with('courses.teacher')
                           ->paginate(10);

        return view('backend.reports.index', compact('students'));
    }

    // Show detailed report for a single student
    public function show($id)
    {
        $student = Student::with('courses.teacher')
                          ->findOrFail($id);

        return view('backend.reports.show', compact('student'));
    }
}
