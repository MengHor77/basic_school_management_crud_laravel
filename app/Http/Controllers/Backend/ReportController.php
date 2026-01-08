<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class ReportController extends Controller
{
    /**
     * Display a listing of reports (students + their courses)
     */
    public function index(Request $request)
    {
        $courseId = $request->input('course_id');

        // Get all courses for filter dropdown
        $courses = Course::all();

        // Query students and their courses
        $query = Student::with('courses');

        if ($courseId) {
            $query->whereHas('courses', function($q) use ($courseId) {
                $q->where('courses.id', $courseId);
            });
        }

        $students = Student::with('courses.teacher')->paginate(10);

        return view('backend.reports.index', compact('students', 'courses', 'courseId'));
    }

    /**
     * Show detailed report for a single student
     */
    public function show($id)
    {
        $student = Student::with('courses.teacher')->findOrFail($id);
        return view('backend.reports.show', compact('student'));
    }
}