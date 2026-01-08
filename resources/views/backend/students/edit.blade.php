@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Edit Student</h2>

    @if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.students.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Password (Leave blank to keep current)</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Assign Courses</label>
            <select name="courses[]" multiple class="w-full border px-3 py-2 rounded">
                @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ in_array($course->id, $assignedCourses) ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.students.index') }}" class="bg-gray-300 px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
