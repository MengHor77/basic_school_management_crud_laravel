@extends('backend.layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md mt-6 max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-indigo-600">{{ $user->name }} Details</h2>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h3 class="mt-4 font-bold">Enrolled Courses</h3>
    <ul class="list-disc list-inside">
        @foreach($user->myCourses as $enroll)
        <li>{{ $enroll->course->title }} (Enrolled: {{ \Carbon\Carbon::parse($enroll->enrolled_date)->format('d-m-Y') }})</li>
        @endforeach
    </ul>

    <a href="{{ route('admin.students.index') }}" class="mt-4 inline-block bg-gray-300 px-4 py-2 rounded">Back</a>
</div>
@endsection
