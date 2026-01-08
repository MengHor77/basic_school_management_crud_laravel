@extends('backend.layouts.app')

@section('title', 'Student Report Details')

@section('content')
<h2 class="text-2xl font-bold mb-4">Report: {{ $student->name }}</h2>

<div class="mb-4 space-y-2">
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Gender:</strong> {{ $student->gender }}</p>
    <p><strong>Age:</strong> {{ $student->age }}</p>
    <p><strong>Registered At:</strong> {{ $student->created_at->format('d M Y') }}</p>
</div>

<h3 class="mt-4 font-semibold mb-2">Enrolled Courses</h3>

@if($student->courses->isEmpty())
    <p class="text-gray-500">This student has not enrolled in any course.</p>
@else
    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Course Name</th>
                <th class="border px-4 py-2">Teacher</th>
                <th class="border px-4 py-2">Enrolled Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student->courses as $course)
                <tr>
                    <td class="border px-4 py-2">{{ $course->title }}</td>
                    <td class="border px-4 py-2">{{ $course->teacher ? $course->teacher->name : 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($course->pivot->enrolled_date)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('admin.reports.index') }}" 
   class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
   Back to Reports
</a>
@endsection
