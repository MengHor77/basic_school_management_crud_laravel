@extends('frontend.layout.app')

@section('title', 'My Courses')

@section('content')

{{-- ================= PAGE HEADER ================= --}}
<div class="flex items-center justify-between mb-8">
    <h2 class="text-3xl font-bold text-gray-800">My Courses</h2>
</div>

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

{{-- ================= COURSE LIST ================= --}}
@if($myCourses->count())
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($myCourses as $myCourse)
    <div class="bg-white rounded-xl shadow-sm border hover:shadow-md transition">

        <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900">
                {{ $myCourse->course->title }}
            </h3>

            <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                {{ Str::limit($myCourse->course->description, 130) }}
            </p>

            <div class="mt-4 text-sm text-gray-500">
                📅 {{ $myCourse->course->start_date }} → {{ $myCourse->course->end_date }}
            </div>

            {{-- ACTION --}}
            <div class="mt-6 flex gap-3">

                {{-- View Course --}}
                <a href="{{ route('frontend.myCourse.showCourse', $myCourse->course->id) }}" class="flex-1 inline-flex items-center justify-center gap-2
                    py-2.5 rounded-lg
                    bg-indigo-600 text-white text-sm font-semibold
                    hover:bg-indigo-700
                    focus:outline-none focus:ring-2 focus:ring-indigo-400
                    transition">
                    View Course
                </a>

                {{-- Remove Course --}}
                <form action="{{ route('myCourse.remove', $myCourse->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2
                        py-2.5 rounded-lg
                        bg-red-600 text-white text-sm font-semibold
                        hover:bg-red-700
                        focus:outline-none focus:ring-2 focus:ring-red-400
                        transition">
                        Remove Course
                    </button>
                </form>

            </div>

        </div>

    </div>
    @endforeach
</div>
@else
<div class="bg-white rounded-xl shadow-sm border p-8 text-center text-gray-600">
    <p class="text-lg font-medium">You have not enrolled in any courses yet.</p>
    <a href="{{ route('frontend.home') }}" class="inline-block mt-4 px-6 py-2.5 rounded-lg
       bg-indigo-600 text-white text-sm font-semibold
       hover:bg-indigo-700 transition">
        Browse Courses
    </a>
</div>
@endif

@endsection