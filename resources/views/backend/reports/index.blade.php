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
                <th class="border px-4 py-2">Gender</th>
                <th class="border px-4 py-2">Age</th>
                <th class="border px-4 py-2">Courses Enrolled</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->gender }}</td>
                    <td class="border px-4 py-2">{{ $student->age }}</td>
                    <td class="border px-4 py-2">
                        {{ $student->courses->count() }} course(s)
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

    <div class="mt-4">
        {{ $students->links() }} <!-- Pagination links -->
    </div>
@endif
@endsection
