@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-bold mb-4">Edit Schedule</h1>

    <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Course Select -->
        <label for="course_id" class="block font-semibold">Course</label>
        <select name="course_id" id="course_id" class="border rounded px-3 py-2 w-full" required>
            <option value="">-- Select Course --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $schedule->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>

        <!-- Teacher Select -->
        <label for="teacher_id" class="block font-semibold">Teacher</label>
        <select name="teacher_id" id="teacher_id" class="border rounded px-3 py-2 w-full" required>
            <option value="">-- Select Teacher --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $schedule->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>

        <!-- Student Select (optional) -->
        <label for="student_id" class="block font-semibold">Student (Optional)</label>
        <select name="student_id" id="student_id" class="border rounded px-3 py-2 w-full">
            <option value="">-- Select Student --</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ $schedule->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>

        <!-- Day Input -->
        <label for="day" class="block font-semibold">Day</label>
        <input type="text" name="day" id="day" value="{{ old('day', $schedule->day) }}" class="border rounded px-3 py-2 w-full" required>

        <!-- Start Time Input -->
        <label for="start_time" class="block font-semibold">Start Time</label>
        <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $schedule->start_time) }}" class="border rounded px-3 py-2 w-full" required>

        <!-- End Time Input -->
        <label for="end_time" class="block font-semibold">End Time</label>
        <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $schedule->end_time) }}" class="border rounded px-3 py-2 w-full" required>

        <!-- Room Input -->
        <label for="room" class="block font-semibold">Room (optional)</label>
        <input type="text" name="room" id="room" value="{{ old('room', $schedule->room) }}" class="border rounded px-3 py-2 w-full">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.schedule.index') }}" class="text-gray-600 hover:underline ml-4">Cancel</a>
    </form>
    </div>
@endsection
