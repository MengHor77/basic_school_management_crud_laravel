@extends('backend.layouts.app')

@section('title', 'Reports')

@section('content')
<h2 class="text-2xl font-bold mb-4">Student Reports</h2>

@if($students->isEmpty())
<p class="text-gray-500">No students have enrolled in any courses yet.</p>
@else
<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Courses Enrolled</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td class="border px-4 py-2">{{ $student->name }}</td>
            <td class="border px-4 py-2">{{ $student->email }}</td>
            <td class="border px-4 py-2">
                {{ $student->myCourses->count() }} course(s)
                @if($student->myCourses->count() > 0)
                <ul class="list-disc list-inside mt-1">
                    @foreach($student->myCourses as $myCourse)
                    <li>
                        {{ $myCourse->course->title ?? 'Deleted Course' }}
                        (Enrolled: {{ \Carbon\Carbon::parse($myCourse->enrolled_date)->format('d-m-Y') }})
                    </li>
                    @endforeach
                </ul>
                @endif
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.reports.show', $student->id) }}"
                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif
<!-- Pagination -->
@include('backend.components.pagination', ['paginator' => $students])

@endsection