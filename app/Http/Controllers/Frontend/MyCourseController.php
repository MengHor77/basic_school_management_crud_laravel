<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\MyCourse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MyCourseController extends Controller
{
    public function index()
    {
        $myCourses = auth()->check()
            ? MyCourse::with('course')
                ->where('user_id', Auth::id())
                ->get()
            : collect();

        return view('frontend.myCourse.index', compact('myCourses'));
    }

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);

        // Prevent duplicate enrollment
        $exists = MyCourse::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->with('error', 'You are already enrolled in this course.');
        }

        MyCourse::create([
            'user_id'       => Auth::id(),
            'course_id'     => $course->id,
            'enrolled_date' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Enrolled successfully.');
    }

    public function remove($id)
    {
        $myCourse = MyCourse::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$myCourse) {
            return redirect()->back()->with('error', 'Not authorized.');
        }

        $myCourse->delete();
        return redirect()->back()->with('success', 'Course removed.');
    }
}
