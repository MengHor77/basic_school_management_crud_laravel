<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = Course::orderBy('id','desc')->paginate(3);

        return view('backend.courses.index', [
            'courses' => $courses,
            'paginator' => $courses, // <== used by layout
        ]);
    }


    // Show the form for creating a new course
    public function create()
    {
        return view('backend.courses.create');
    }

    // Store a newly created course in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'capacity' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'capacity' => $request->capacity ?? 0,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    // Show the form for editing the specified course
    public function edit(Course $course)
    {
        return view('backend.courses.edit', compact('course'));
    }

    // Update the specified course in storage
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'capacity' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'capacity' => $request->capacity ?? 0,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    // Remove the specified course from storage
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
