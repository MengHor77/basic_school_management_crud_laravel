@extends('backend.layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Courses List</h1>

<a href="{{ route('admin.courses.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Add New Course
</a>

@if(session('success'))
<div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
    {{ session('success') }}
</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow">
        <thead>
            <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                <th class="py-3 px-6 border-b">ID</th>
                <th class="py-3 px-6 border-b">Title</th>
                <th class="py-3 px-6 border-b">Duration</th>
                <th class="py-3 px-6 border-b">Capacity</th>
                <th class="py-3 px-6 border-b">Status</th>
                <th class="py-3 px-6 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-6 border-b">{{ $course->id }}</td>
                <td class="py-3 px-6 border-b">{{ $course->title }}</td>
                <td class="py-3 px-6 border-b">{{ $course->start_date }} → {{ $course->end_date }}</td>
                <td class="py-3 px-6 border-b">{{ $course->capacity }}</td>
                <td class="py-3 px-6 border-b">
                    @if($course->is_active)
                    <span class="px-2 py-1 text-xs bg-green-200 text-green-800 rounded">Active</span>
                    @else
                    <span class="px-2 py-1 text-xs bg-red-200 text-red-800 rounded">Inactive</span>
                    @endif
                </td>
                <td class="py-3 px-6 border-b space-x-2">
                    {{-- Edit --}}
                    <a href="{{ route('admin.courses.edit', $course->id) }}"
                        class="inline-block px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-sm">
                        Edit
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')"
                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Pagination --}}

@include('backend.components.pagination', ['paginator' => $courses])

@endsection