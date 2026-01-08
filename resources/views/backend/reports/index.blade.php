@extends('backend.layouts.app')

@section('title', 'Reports')

@section('content')
<h2 class="text-2xl font-bold mb-4">Reports</h2>

<!-- Filter by Course -->
<form method="GET" class="mb-4 flex items-center gap-2">
    <label for="course_id">Filter by Course:</label>
    <select name="course_id" id="course_id" class="border rounded p-1">
        <option value="">All Courses</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" @if($courseId == $course->id) selected @endif>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
</form>

<!-- Students Table -->
<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Courses</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
        <tr>
            <td class="border px-4 py-2">{{ $student->id }}</td>
            <td class="border px-4 py-2">{{ $student->name }}</td>
            <td class="border px-4 py-2">{{ $student->email }}</td>
            <td class="border px-4 py-2">
                @foreach($student->courses as $course)
                    <span class="inline-block bg-gray-200 rounded px-2 py-1 mr-1 mb-1">
                        {{ $course->name }}
                    </span>
                @endforeach
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.reports.show', $student->id) }}" 
                   class="px-2 py-1 bg-green-600 text-white rounded">View</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center p-4">No reports found</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $students->links() }}
</div>
@endsection 
