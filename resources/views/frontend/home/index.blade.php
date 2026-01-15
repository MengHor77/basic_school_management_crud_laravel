@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative h-screen mb-16 overflow-hidden rounded-2xl shadow-2xl flex items-center">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('storage/herosection/home.png') }}" alt="Online Learning Platform"
            class="w-full h-full object-cover">
        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 via-indigo-900/60 to-indigo-800/50"></div>
    </div>

    {{-- Content --}}
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
            {{-- Logged-in users --}}
            <a href="#courses"
                class="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg hover:bg-indigo-700 transition-all">
                Explore Courses
            </a>

            <a href="#courses"
                class="inline-flex items-center justify-center px-8 py-3 rounded-xl border border-indigo-300 text-indigo-100 font-semibold hover:bg-white/10 transition-all">
                View Courses
            </a>
            @else
            {{-- Guests --}}
            <a href="{{ route('user.login') }}"
                class="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg hover:bg-indigo-700 transition-all">
                Explore Courses
            </a>

            <a href="{{ route('user.register') }}"
                class="inline-flex items-center justify-center px-8 py-3 rounded-xl border border-indigo-300 text-indigo-100 font-semibold hover:bg-white/10 transition-all">
                Get Started
            </a>
            @endauth

        </div>

    </div>

</section>


{{-- ================= COURSES SECTION ================= --}}
<section id="courses" class="mb-24">

    {{-- Section Header --}}
    <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
            Our Courses
        </h2>
        <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
            Explore high-quality courses carefully designed to help you gain real-world skills
            and advance your career.
        </p>
    </div>

    @if($courses->count())
    @php
    $enrolledCourseIds = auth()->check()
    ? auth()->user()->myCourses()->pluck('course_id')->toArray()
    : [];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        @foreach($courses as $course)
        <div
            class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">

            {{-- Thumbnail --}}
            <div class="relative h-52 overflow-hidden">
                <img src="{{ asset('storage/course/course.png') }}" alt="Course Image"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                <span
                    class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                    Featured
                </span>
            </div>

            {{-- Content --}}
            <div class="p-6 flex flex-col h-full">

                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">
                    {{ $course->title }}
                </h3>

                <p class="mt-3 text-sm text-gray-600 leading-relaxed line-clamp-3">
                    {{ Str::limit($course->description, 130) }}
                </p>

                {{-- Meta Info --}}
                <div class="mt-6 space-y-3 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <span class="text-indigo-600">📅</span>
                        <span>{{ $course->start_date }} – {{ $course->end_date }}</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-600">👥</span>
                            <span>{{ $course->capacity }} Students</span>
                        </div>

                        <span class="text-indigo-600 font-bold text-lg">
                            FREE
                        </span>
                    </div>
                </div>

                {{-- Action --}}
                <div class="mt-8 pt-6 border-t border-gray-100">

                    @auth
                    @if(in_array($course->id, $enrolledCourseIds))
                    <button disabled
                        class="w-full py-3 rounded-xl bg-gray-100 text-gray-400 text-sm font-semibold cursor-not-allowed">
                        Enrolled
                    </button>
                    @else
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button
                            class="w-full py-3 rounded-xl bg-indigo-600 text-white text-sm font-semibold
                                           hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 active:scale-95">
                            Enroll Now
                        </button>
                    </form>
                    @endif
                    @else
                    <a href="{{ route('user.login') }}" class="block text-center w-full py-3 rounded-xl bg-gray-900 text-white text-sm font-semibold
                                   hover:bg-gray-800 transition shadow-lg shadow-gray-200">
                        Login to Enroll
                    </a>
                    @endauth

                </div>
            </div>
        </div>
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

    {{-- Section Header --}}
    <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
            Meet Our Instructors
        </h2>
        <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
            Learn from experienced and dedicated instructors who are passionate about
            teaching and guiding students toward success.
        </p>
    </div>

    @if($teachers->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

        @foreach($teachers as $teacher)
        @php
        $isActive = (bool) $teacher->is_active;
        @endphp

        <div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm
            transition-all duration-300 overflow-hidden
            {{ $isActive ? 'hover:shadow-2xl hover:-translate-y-1' : 'opacity-60 bg-gray-50' }}">

            {{-- Status Badge --}}
            @unless($isActive)
            <span class="absolute top-4 right-4 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                Inactive
            </span>
            @endunless

            {{-- Avatar --}}
            <div class="flex justify-center pt-8">
                <div class="w-24 h-24 flex items-center justify-center rounded-full text-3xl font-bold shadow-lg
                    {{ $isActive
                        ? 'bg-gradient-to-tr from-indigo-600 to-purple-500 text-white'
                        : 'bg-gray-300 text-gray-500' }}">
                    {{ strtoupper(substr($teacher->name, 0, 1)) }}
                </div>
            </div>

            {{-- Content --}}
            <div class="text-center px-6 pb-8 pt-6">
                <h3 class="text-lg font-bold text-gray-900">
                    {{ $teacher->name }}
                </h3>

                <span class="inline-block mt-2 px-4 py-1 rounded-full text-xs font-semibold
                    {{ $isActive ? 'bg-indigo-50 text-indigo-600' : 'bg-gray-200 text-gray-400' }}">
                    {{ $teacher->subject }}
                </span>

                {{-- Contact --}}
                <div class="mt-6 pt-6 border-t border-gray-100 space-y-3 text-sm text-gray-500">

                    <div class="flex items-center justify-center gap-2
                        {{ $isActive ? 'hover:text-indigo-600 cursor-pointer transition' : '' }}">
                        <span>📞</span>
                        <span>{{ $teacher->phone }}</span>
                    </div>

                    <div class="flex items-center justify-center gap-2
                        {{ $isActive ? 'hover:text-indigo-600 cursor-pointer transition' : '' }}">
                        <span>✉</span>
                        <span>{{ $teacher->email }}</span>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>
    @else
    <p class="text-center text-gray-400 italic">
        No instructors available at the moment.
    </p>
    @endif

</section>

@endsection