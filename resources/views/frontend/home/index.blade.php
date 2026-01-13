@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- ================= HERO SECTION (NEW ADDED) ================= --}}
<div class="relative bg-indigo-900 rounded-2xl overflow-hidden mb-14 shadow-2xl">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/herosection/home.png') }}" alt="course" class="w-full h-full object-cover">
    </div>
    <div class="relative max-w-7xl mx-auto py-16 px-8 sm:py-24">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl text-center">
            Expand your knowledge
        </h1>
        <p class="mt-6 text-xl text-indigo-100 max-w-3xl mx-auto text-center">
           Discover our premier courses designed to advance your technical skills and career, guided by industry-expert instructors.
        </p>
    </div>
</div>

{{-- ================= FLASH MESSAGES ================= --}}
@if(session('success'))
<div class="mb-6 flex items-center gap-3 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200 animate-pulse">
    <span class="bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">✔</span>
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="mb-6 flex items-center gap-3 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
    <span class="bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">✖</span>
    <span class="font-medium">{{ session('error') }}</span>
</div>
@endif

{{-- ================= COURSES SECTION ================= --}}
<section class="mb-20">
    <div class="flex items-center justify-between mb-8 border-l-4 border-indigo-600 pl-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Course</h2>
            <p class="text-gray-500 text-sm">Choose any course for yourselft</p>
        </div>
    </div>

    @if($courses->count())
    @php
    $enrolledCourseIds = auth()->check()
    ? auth()->user()->myCourses()->pluck('course_id')->toArray()
    : [];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($courses as $course)
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            {{-- Course Image Placeholder --}}
            <div class="h-48 bg-indigo-100 relative overflow-hidden">
                <img src="{{ asset('storage/course/course.png') }}" alt="Course Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-indigo-600 text-xs font-bold shadow">
                    New
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">
                    {{ $course->title }}
                </h3>

                <p class="mt-3 text-sm text-gray-600 leading-relaxed line-clamp-2">
                    {{ Str::limit($course->description, 110) }}
                </p>

                <div class="mt-5 pt-5 border-t border-gray-50 space-y-2 text-sm text-gray-500 font-medium">
                    <div class="flex items-center gap-2">
                        <span>📅</span> {{ $course->start_date }} → {{ $course->end_date }}
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span>👥</span> Capacity: {{ $course->capacity }}
                        </div>
                        <span class="text-indigo-600 font-bold text-lg">FREE</span>
                    </div>
                </div>

                {{-- ACTIONS --}}
                <div class="mt-6">
                    @auth
                    @if(in_array($course->id, $enrolledCourseIds))
                    <button disabled
                        class="w-full py-3 rounded-xl bg-gray-100 text-gray-400 text-sm font-bold cursor-not-allowed">
                        Already Enrolled
                    </button>
                    @else
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button class="w-full py-3 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all active:scale-95">
                            Enroll Now
                        </button>
                    </form>
                    @endif
                    @else
                    <a href="{{ route('user.login') }}" class="block w-full text-center py-3 rounded-xl bg-gray-900 text-white text-sm font-bold hover:bg-gray-800 transition shadow-lg shadow-gray-200">
                        Login to Enroll
                    </a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-gray-50 p-10 rounded-2xl text-center border-2 border-dashed">
        <p class="text-gray-400">No courses available.</p>
    </div>
    @endif
</section>

{{-- ================= TEACHERS SECTION ================= --}}
<section class="pb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 uppercase tracking-widest">Teachers</h2>
        <div class="h-1 w-20 bg-indigo-600 mx-auto mt-2 rounded-full"></div>
    </div>

    @if($teachers->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($teachers as $teacher)
        <div class="bg-white rounded-2xl border border-gray-100 p-8 text-center hover:shadow-xl hover:border-indigo-200 transition-all duration-300">
            <div class="relative w-24 h-24 mx-auto mb-4">
                <div class="w-full h-full flex items-center justify-center rounded-full bg-gradient-to-tr from-indigo-600 to-purple-500 text-white text-3xl font-bold shadow-lg">
                    {{ strtoupper(substr($teacher->name, 0, 1)) }}
                </div>
                <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
            </div>

            <h3 class="text-lg font-bold text-gray-900">
                {{ $teacher->name }}
            </h3>

            <p class="inline-block px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full mt-2">
                {{ $teacher->subject }}
            </p>

            <div class="mt-6 pt-6 border-t border-gray-50 text-sm text-gray-500 space-y-2 italic">
                <p class="flex items-center justify-center gap-2 hover:text-indigo-600 cursor-pointer">
                    <span>📞</span> {{ $teacher->phone }}
                </p>
                <p class="flex items-center justify-center gap-2 hover:text-indigo-600 cursor-pointer">
                    <span>✉</span> {{ $teacher->email }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-400 text-center italic">No teachers available at the moment.</p>
    @endif
</section>

@endsection