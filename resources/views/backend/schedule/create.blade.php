@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-bold mb-4">Add New Schedule</h1>

    <form action="{{ route('admin.schedule.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Course Select -->
        <label for="course_id" class="block font-semibold">Course</label>
        <select name="course_id" id="course_id" class="border rounded px-3 py-2 w-full" required>
            <option value="">-- Select Course --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>

        <!-- Teacher Select -->
        <label for="teacher_id" class="block font-semibold">Teacher</label>
        <select name="teacher_id" id="teacher_id" class="border rounded px-3 py-2 w-full" required>
            <option value="">-- Select Teacher --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>

        <!-- Student Select (optional) -->
        <label for="student_id" class="block font-semibold">Student (Optional)</label>
        <select name="student_id" id="student_id" class="border rounded px-3 py-2 w-full">
            <option value="">-- None --</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>

        <!-- Day -->
        <label for="day" class="block font-semibold">Day</label>
        <input type="text" name="day" id="day" value="{{ old('day') }}" class="border rounded px-3 py-2 w-full" required>

        <!-- Start Time -->
        <label for="start_time" class="block font-semibold">Start Time</label>
        <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" class="border rounded px-3 py-2 w-full" required>

        <!-- End Time -->
        <label for="end_time" class="block font-semibold">End Time</label>
        <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" class="border rounded px-3 py-2 w-full" required>

        <!-- Room (optional) -->
        <label for="room" class="block font-semibold">Room (Optional)</label>
        <input type="text" name="room" id="room" value="{{ old('room') }}" class="border rounded px-3 py-2 w-full">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('admin.schedule.index') }}" class="text-gray-600 hover:underline ml-4">Cancel</a>
    </form>        
    </div>
@endsection
