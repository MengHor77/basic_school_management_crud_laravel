@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative h-screen mb-16 overflow-hidden rounded-2xl shadow-2xl flex items-center">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/herosection/home.png') }}" alt="Online Learning Platform" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 via-indigo-900/60 to-indigo-800/50"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
            Build Skills for the
            <span class="block text-indigo-300">Future You Want</span>
        </h1>

        <p class="mt-6 text-lg sm:text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
            Learn from industry-experienced instructors through carefully designed courses
            that help you grow, upskill, and advance your career with confidence.
        </p>

        {{-- CTA Buttons --}}
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            @auth
                <x-callToActionButton text="Explore Courses" link="#courses" />
                <x-callToActionButton text="View Courses" link="#courses" :primary="false" />
            @else
                <x-callToActionButton text="Explore Courses" link="{{ route('user.login') }}" />
                <x-callToActionButton text="Get Started" link="{{ route('user.register') }}" :primary="false" />
            @endauth
        </div>
    </div>
</section>

{{-- ================= COURSES SECTION ================= --}}
<section id="courses" class="mb-24">
    <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Our Courses</h2>
        <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
            Explore high-quality courses carefully designed to help you gain real-world skills
            and advance your career.
        </p>
    </div>

    @if($courses->count())
        @php
            $enrolledCourseIds = auth()->check() ? auth()->user()->myCourses()->pluck('course_id')->toArray() : [];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($courses as $course)
                <x-cardCourse :course="$course" :enrolledCourseIds="$enrolledCourseIds" />
            @endforeach
        </div>
    @else
        <div class="bg-gray-50 p-12 rounded-2xl text-center border border-dashed">
            <p class="text-gray-400 text-lg">No courses available at the moment.</p>
        </div>
    @endif
</section>

{{-- ================= TEACHERS SECTION ================= --}}
<section class="pb-24">
    <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Meet Our Instructors</h2>
        <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
            Learn from experienced and dedicated instructors who are passionate about teaching and guiding students toward success.
        </p>
    </div>

    @if($teachers->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @foreach($teachers as $teacher)
                <x-cardTeacher :teacher="$teacher" />
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-400 italic">No instructors available at the moment.</p>
    @endif
</section>

@endsection 