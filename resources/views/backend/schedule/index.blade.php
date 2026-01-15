@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Schedules List</h1>

<a href="{{ route('admin.schedule.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Add New Schedule
</a>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<table class="min-w-full border border-gray-300 bg-white rounded shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Course</th>
            <th class="px-4 py-2">Teacher</th>
            <th class="px-4 py-2">Day</th>
            <th class="px-4 py-2">Time</th>
            <th class="px-4 py-2">Room</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $schedule)
        <tr class="border-t hover:bg-gray-50">
            <td class="px-4 py-2">{{ $schedule->id }}</td>
            <td class="px-4 py-2">{{ $schedule->course->title }}</td>
            <td class="px-4 py-2">{{ $schedule->teacher->name }}</td>
            <td class="px-4 py-2">{{ $schedule->day }}</td>
            <td class="px-4 py-2">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
            <td class="px-4 py-2">{{ $schedule->room ?? '-' }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('admin.schedule.show', $schedule->id) }}"
                    class="text-blue-600 hover:underline">View</a>
                <a href="{{ route('admin.schedule.edit', $schedule->id) }}"
                    class="text-yellow-600 hover:underline">Edit</a>
                <form action="{{ route('admin.schedule.destroy', $schedule->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')"
                        class="text-red-600 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Pagination -->
<x-pagination :paginator="$schedules" />
@endsection