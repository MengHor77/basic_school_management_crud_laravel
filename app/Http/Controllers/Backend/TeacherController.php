<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;  // Assuming you have a Teacher model
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();  // Fetch all teachers
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        Teacher::create($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('backend.teachers.edit', compact('teacher'));
    }


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Teacher $teacher)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:teachers,email,' . $teacher->id,
        'phone' => 'nullable|string|max:20',
        'subject' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'is_active' => 'required|boolean',
    ]);

    $teacher->update($request->all());

    return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
