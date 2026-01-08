@extends('backend.layouts.app')

@section('title', 'Student Report')

@section('content')
<h2 class="text-2xl font-bold mb-4 text-indigo-600">Student Report: {{ $student->name }}</h2>

<div class="bg-white p-6 rounded shadow">
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email ?? 'N/A' }}</p>
    <p><strong>Age:</strong> {{ $student->age ?? 'N/A' }}</p>

    <h3 class="mt-4 text-xl font-semibold">Courses Enrolled</h3>
    @if($student->myCourses->isEmpty())
        <p class="text-gray-500">This student has not enrolled in any courses.</p>
    @else
        <ul class="list-disc list-inside mt-2">
            @foreach($student->myCourses as $myCourse)
                <li>
                    <span class="font-medium">{{ $myCourse->course->title ?? 'Deleted Course' }}</span>
                    - Enrolled on: {{ \Carbon\Carbon::parse($myCourse->enrolled_date)->format('d-m-Y') }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admin.reports.index') }}" 
       class="mt-4 inline-block bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
       Back to Reports
    </a>
</div>
@endsection
