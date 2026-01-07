@extends('frontend.layout.app')

@section('title', $course->title)

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm">
    {{-- Course Title --}}
    <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>

    {{-- Course Description --}}
    <p class="text-gray-600 mb-4">{{ $course->description }}</p>

    {{-- Course Dates --}}
    <div class="text-sm text-gray-500 mb-4">
        📅 {{ $course->start_date }} → {{ $course->end_date }}
    </div>

    {{-- Optional: Course Capacity --}}
    @if($course->capacity)
    <div class="text-sm text-gray-500 mb-4">
        👥 Capacity: {{ $course->capacity }}
    </div>
    @endif

    {{-- Optional: Enrollment Button --}}
    @php
    $isEnrolled = auth()->check() && auth()->user()->myCourses->contains('course_id', $course->id);
    @endphp

    {{-- Back Button --}}
    <a href="{{ route('frontend.myCourse') }}" class="inline-block mt-6 px-6 py-2.5 rounded-lg
       bg-gray-600 text-white text-sm font-semibold
       hover:bg-gray-700 transition">
        Back to My Courses
    </a>
    @if(auth()->check())
    @if(!$isEnrolled)
    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
        @csrf
        <button type="submit"
            class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
            Enroll in Course
        </button>
    </form>
    @else
    <span class="inline-block px-6 py-2.5 rounded-lg bg-green-600 text-white font-semibold">
        Already Enrolled
    </span>
    @endif
    @endif


</div>
@endsection