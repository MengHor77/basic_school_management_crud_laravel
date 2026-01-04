@extends('frontend.layout.app')

@section('title', 'Home')

@section('content')

{{-- COURSES SECTION --}}
<h2 class="text-3xl font-bold mb-4">Courses</h2>

@if($courses->count())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
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
                <form action="">
                   <div >
                     <button class ="w-max bg-indigo-600 mt-5 px-3 py-2 rounded-md text-white">enroll</button>
                   </div>
                </form>
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
