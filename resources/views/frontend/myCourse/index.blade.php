@extends('frontend.layout.app')

@section('title', 'My Courses')

@section('content')

<h2 class="text-3xl font-bold mb-4">My Courses</h2>

{{-- Show success or error message --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

@auth
    @if($myCourses->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($myCourses as $course)
                <div class="bg-white p-5 rounded shadow relative">
                    <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                    <p class="text-sm mt-2">📅 {{ $course->start_date }} → {{ $course->end_date }}</p>
                    <p class="text-sm">👥 Capacity: {{ $course->capacity }}</p>
                    <p class="text-sm text-indigo-600 mt-2">Enrolled at: {{ $course->enrolled_date }}</p>

                    {{-- Remove Button --}}
                    <form action="{{ route('myCourse.remove', $course->id) }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            Remove
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>You have not enrolled in any courses yet.</p>
    @endif
@else
    <p class="text-red-600">
        You are not logged in. Please 
        <a href="{{ route('user.login') }}" class="text-indigo-600 underline">login</a> 
        or 
        <a href="{{ route('user.register') }}" class="text-indigo-600 underline">register</a> 
        to see your enrolled courses.
    </p>
@endauth

@endsection
