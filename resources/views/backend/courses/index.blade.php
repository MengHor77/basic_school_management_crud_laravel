@extends('backend.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <h1 class="text-3xl font-bold mb-6">Course List</h1>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('admin.courses.create') }}"
        class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add New Course
    </a>

    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Start Date</th>
                <th class="py-2 px-4 border-b">End Date</th>
                <th class="py-2 px-4 border-b">Capacity</th>
                <th class="py-2 px-4 border-b">Active</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
            <tr>
                <td class="border-b py-2 px-4">{{ $course->id }}</td>
                <td class="border-b py-2 px-4">{{ $course->title }}</td>
                <td class="border-b py-2 px-4">{{ $course->start_date ?? '-' }}</td>
                <td class="border-b py-2 px-4">{{ $course->end_date ?? '-' }}</td>
                <td class="border-b py-2 px-4">{{ $course->capacity }}</td>
                <td class="border-b py-2 px-4">
                    @if($course->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                    @else
                    <span class="text-red-600 font-semibold">No</span>
                    @endif
                </td>
                <td class="border-b py-2 px-4 space-x-2">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-4">No courses found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- Pagination -->
<x-pagination :paginator="$courses" />
@endsection