@extends('frontend.layout.app')

@section('title', 'My Courses')

@section('content')

<h2 class="text-3xl font-bold mb-4">My Courses</h2>

{{-- Success Message --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

@if($myCourses->count())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($myCourses as $myCourse)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold text-lg">
                    {{ $myCourse->course->title }}
                </h3>

                <p class="text-gray-600 mt-2">
                    {{ $myCourse->course->description }}
                </p>

                <p class="text-sm mt-2">
                    📅 {{ $myCourse->course->start_date }}
                    →
                    {{ $myCourse->course->end_date }}
                </p>

                <form action="{{ route('myCourse.remove', $myCourse->id) }}" method="POST">
                    @csrf
                    <button class="text-red-600 mt-3 hover:underline">
                        Remove
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <p>You have not enrolled in any courses.</p>
@endif

@endsection
