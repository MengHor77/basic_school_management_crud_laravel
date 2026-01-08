@extends('backend.layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-4 text-indigo-600">Students</h2>

    <a href="{{ route('admin.students.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New Student</a>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Courses</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td class="border px-4 py-2">{{ $student->name }}</td>
                <td class="border px-4 py-2">{{ $student->email }}</td>
                <td class="border px-4 py-2">
                    @foreach($student->myCourses as $enroll)
                        {{ $enroll->course->title }}<br>
                    @endforeach
                </td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
                    <a href="{{ route('admin.students.show', $student->id) }}" class="bg-blue-500 px-2 py-1 rounded text-white">View</a>
                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Delete student?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 px-2 py-1 rounded text-white">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection
