@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- Show Success Message --}}
@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

{{-- Show Error Message --}}
@if(session('error'))
<div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
    {{ session('error') }}
</div>
@endif

{{-- COURSES SECTION --}}
<h2 class="text-3xl font-bold mb-4">Courses</h2>

@if($courses->count())
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    @php
    // Get array of course IDs the logged-in user has enrolled in
    $enrolledCourseIds = auth()->check() ? auth()->user()->myCourses()->pluck('course_id')->toArray() : [];
    @endphp

    @foreach($courses as $course)
    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
        <p class="text-gray-600 mt-2">
            {{ Str::limit($course->description, 100) }}
        </p>
        <p class="text-sm mt-2">
            📅 {{ $course->start_date }} → {{ $course->end_date }}
        </p>
        <p class="text-sm">
            👥 Capacity: {{ $course->capacity }}
        </p>

        @auth
        @if(in_array($course->id, $enrolledCourseIds))
        <button class="w-max bg-gray-400 mt-5 px-3 py-2 rounded-md text-white cursor-not-allowed" disabled>
            Already Enrolled
        </button>
        @else
        <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
            @csrf
            <button class="mt-5 inline-flex items-center justify-center
           px-5 py-2.5
           bg-indigo-600 text-white text-sm font-semibold
           rounded-lg shadow-md
           hover:bg-indigo-700
           focus:outline-none focus:ring-2 focus:ring-indigo-400
           transition">
                Enroll
            </button>

        </form>
        @endif
        @else
        <a href="{{ route('user.login') }}" class="inline-block mt-5 bg-gray-400 px-3 py-2 rounded-md text-white">
            Login to Enroll
        </a>
        @endauth

    </div>
    @endforeach
</div>
@else
<p>No courses available.</p>
@endif

{{-- TEACHERS SECTION --}}
<h2 class="text-3xl font-bold mb-4">Teachers</h2>

@if($teachers->count())
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    @foreach($teachers as $teacher)
    <div class="bg-white p-5 rounded shadow text-center">
        <h3 class="text-lg font-semibold">{{ $teacher->name }}</h3>
        <p class="text-gray-600">{{ $teacher->subject }}</p>
        <p class="text-sm mt-1">📞 {{ $teacher->phone }}</p>
        <p class="text-sm">✉ {{ $teacher->email }}</p>
    </div>
    @endforeach
</div>
@else
<p>No teachers available.</p>
@endif

@endsection