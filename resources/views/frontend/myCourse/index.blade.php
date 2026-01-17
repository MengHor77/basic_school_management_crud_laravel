@extends('frontend.layout.app')

@section('title', 'My Courses')

@section('content')

{{-- ================= GUEST NOTICE ================= --}}
@guest
<div class="mb-6 p-4 rounded-lg bg-yellow-50 text-yellow-700 border border-yellow-200">
    Please
    <a href="{{ route('user.login') }}" class="font-semibold underline">
        login
    </a>
    to view your enrolled courses.
</div>
@endguest

{{-- ================= PAGE HEADER ================= --}}
<div class="w-full bg-gray-200 rounded-lg py-3 px-3 shadow-xl text-3xl font-bold text-indigo-600 mb-6">
    <h2>My Course</h2>
</div>

{{-- ================= COURSE LIST ================= --}}
@if($myCourses->count())
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($myCourses as $myCourse)
        <x-cardMyCourse :myCourse="$myCourse" />
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
