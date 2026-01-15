<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
        public function index()
    {
        $schedules = Schedule::with(['course', 'teacher'])
            ->orderBy('day')
            ->orderBy('start_time')
            ->paginate(3);

        return view('backend.schedule.index', compact('schedules'));
    }


    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $students = Student::all();
        return view('backend.schedule.create', compact('courses', 'teachers', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'nullable|exists:students,id',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room' => 'nullable|string',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedule.index')->with('success', 'Schedule created successfully.');
    }

    public function show(Schedule $schedule)
    {
        return view('backend.schedule.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $students = Student::all();
        return view('backend.schedule.edit', compact('schedule', 'courses', 'teachers', 'students'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'nullable|exists:students,id',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room' => 'nullable|string',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedule.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedule.index')->with('success', 'Schedule deleted successfully.');
    }
}
