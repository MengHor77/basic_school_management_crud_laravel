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
        if (auth()->check()) {
            $myCourses = MyCourse::where('user_id', Auth::id())->get();
        } else {
            $myCourses = collect(); // empty collection for guests
        }

        return view('frontend.myCourse.index', compact('myCourses'));
    }

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);

        MyCourse::create([
            'user_id'        => Auth::id(),
            'title'          => $course->title,
            'description'    => $course->description,
            'start_date'     => $course->start_date,
            'end_date'       => $course->end_date,
            'capacity'       => $course->capacity,
            'is_active'      => $course->is_active,
            'enrolled_date' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Enrolled successfully');
    }
    public function remove($id)
    {
        $myCourse = MyCourse::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($myCourse) {
            $myCourse->delete();
            return redirect()->back()->with('success', 'Course removed successfully.');
        }

        return redirect()->back()->with('error', 'Course not found or you are not authorized.');
    }

}
