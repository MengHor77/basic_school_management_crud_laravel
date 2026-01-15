<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // users table
use App\Models\Course;
use App\Models\MyCourse;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        // Fetch all users (students) with their enrolled courses
        $students = User::with('myCourses.course')->paginate(3);
        return view('backend.students.index', [
        'students' => $students,
        'paginator' => $students, // Pass paginator explicitly
    ]);
    }


    // Show create form
    public function create()
    {
        $courses = Course::all();
        return view('backend.students.create', compact('courses'));
    }

    // Store new student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'courses' => 'nullable|array|exists:courses,id',
        ]);

        // Create user (student)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign courses
        if ($request->has('courses')) {
            foreach ($request->courses as $courseId) {
                MyCourse::create([
                    'user_id' => $user->id,
                    'course_id' => $courseId,
                    'enrolled_date' => now(),
                ]);
            }
        }

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $courses = Course::all();
        $assignedCourses = $user->myCourses->pluck('course_id')->toArray();
        return view('backend.students.edit', compact('user', 'courses', 'assignedCourses'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|min:6|confirmed',
            'courses' => 'nullable|array|exists:courses,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Update courses
        $user->myCourses()->delete(); // remove old
        if ($request->has('courses')) {
            foreach ($request->courses as $courseId) {
                MyCourse::create([
                    'user_id' => $user->id,
                    'course_id' => $courseId,
                    'enrolled_date' => now(),
                ]);
            }
        }

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    // Show student details
    public function show($id)
    {
        $user = User::with('myCourses.course')->findOrFail($id);
        return view('backend.students.show', compact('user'));
    }

    // Delete student
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }
}
