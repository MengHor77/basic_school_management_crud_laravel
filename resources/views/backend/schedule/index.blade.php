@extends('backend.layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Schedules List</h1>

<a href="{{ route('admin.schedule.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Add New Schedule
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
                <th class="py-3 px-6 border-b">Course</th>
                <th class="py-3 px-6 border-b">Teacher</th>
                <th class="py-3 px-6 border-b">Day</th>
                <th class="py-3 px-6 border-b">Time</th>
                <th class="py-3 px-6 border-b">Room</th>
                <th class="py-3 px-6 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($schedules as $schedule)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-6 border-b">{{ $schedule->id }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->course->title }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->teacher->name }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->day }}</td>
                <td class="py-3 px-6 border-b">
                    {{ $schedule->start_time }} - {{ $schedule->end_time }}
                </td>
                <td class="py-3 px-6 border-b">{{ $schedule->room ?? '-' }}</td>

                <td class="py-3 px-6 border-b space-x-2">
                    {{-- View --}}
                    <a href="{{ route('admin.schedule.show', $schedule->id) }}"
                       class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                        View
                    </a>

                    {{-- Edit --}}
                    <a href="{{ route('admin.schedule.edit', $schedule->id) }}"
                       class="inline-block px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-sm">
                        Edit
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('admin.schedule.destroy', $schedule->id) }}"
                          method="POST" class="inline">
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
<x-pagination :paginator="$schedules" />

@endsection
