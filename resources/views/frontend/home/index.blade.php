@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- ================= FLASH MESSAGES ================= --}}
@if(session('success'))
<div class="mb-6 flex items-center gap-3 p-4 rounded-lg bg-green-50 text-green-700 border border-green-200">
    <span class="font-semibold">✔</span>
    <span>{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="mb-6 flex items-center gap-3 p-4 rounded-lg bg-red-50 text-red-700 border border-red-200">
    <span class="font-semibold">✖</span>
    <span>{{ session('error') }}</span>
</div>
@endif

{{-- ================= COURSES ================= --}}
<section class="mb-14">
    <div class="w-full bg-gray-200 rounded-lg py-3 px-3 shadow-xl  text-3xl font-bold text-gray-800 mb-6">
        <h2 class="">Course</h2>
    </div>

    @if($courses->count())
    @php
    $enrolledCourseIds = auth()->check()
    ? auth()->user()->myCourses()->pluck('course_id')->toArray()
    : [];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($courses as $course)
        <div class="bg-white rounded-xl shadow-sm border hover:shadow-md transition">

            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $course->title }}
                </h3>

                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    {{ Str::limit($course->description, 110) }}
                </p>

                <div class="mt-4 space-y-1 text-sm text-gray-500">
                    <p>📅 {{ $course->start_date }} → {{ $course->end_date }}</p>
                    <p>👥 Capacity: {{ $course->capacity }}</p>
                </div>

                {{-- ACTIONS --}}
                <div class="mt-6">
                    @auth
                    @if(in_array($course->id, $enrolledCourseIds))
                    <button disabled
                        class="w-full py-2.5 rounded-lg bg-gray-200 text-gray-500 text-sm font-semibold cursor-not-allowed">
                        Already Enrolled
                    </button>
                    @else
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button class="w-full inline-flex items-center justify-center gap-2
                                        py-2.5 rounded-lg
                                        bg-indigo-600 text-white text-sm font-semibold
                                        hover:bg-indigo-700
                                        focus:outline-none focus:ring-2 focus:ring-indigo-400
                                        transition">
                            Enroll Now
                        </button>
                    </form>
                    @endif
                    @else
                    <a href="{{ route('user.login') }}" class="block w-full text-center py-2.5 rounded-lg
                               bg-gray-300 text-gray-700 text-sm font-semibold
                               hover:bg-gray-400 transition">
                        Login to Enroll
                    </a>
                    @endauth
                </div>
            </div>

        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-500">No courses available.</p>
    @endif
</section>

{{-- ================= TEACHERS ================= --}}
<section>
    <div class="w-full bg-gray-200 rounded-lg py-3 px-3 shadow-xl  text-3xl font-bold text-gray-800 mb-6">
        <h2 class="">Teachers</h2>
    </div>
    @if($teachers->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($teachers as $teacher)
        <div class="bg-white rounded-xl shadow-sm border p-6 text-center hover:shadow-md transition">
            <div
                class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 text-xl font-bold">
                {{ strtoupper(substr($teacher->name, 0, 1)) }}
            </div>

            <h3 class="mt-4 text-lg font-semibold text-gray-900">
                {{ $teacher->name }}
            </h3>

            <p class="text-sm text-gray-600 mt-1">
                {{ $teacher->subject }}
            </p>

            <div class="mt-3 text-sm text-gray-500 space-y-1">
                <p>📞 {{ $teacher->phone }}</p>
                <p>✉ {{ $teacher->email }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-500">No teachers available.</p>
    @endif
</section>

@endsection