@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Edit Student</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.students.update', $user->id) }}">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $user->name) }}" required
                   class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $user->email) }}" required
                   class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Password --}}
        <div class="mb-4 relative">
            <label class="block text-gray-700">Password (Leave blank to keep current)</label>
            <input id="password" type="password" name="password"
                   class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <button type="button"
                    onclick="togglePassword('password', 'eye1')"
                    class="absolute right-3 top-9 text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-eye" id="eye1"></i>
            </button>
        </div>

        {{-- Confirm Password --}}
        <div class="mb-4 relative">
            <label class="block text-gray-700">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <button type="button"
                    onclick="togglePassword('password_confirmation', 'eye2')"
                    class="absolute right-3 top-9 text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-eye" id="eye2"></i>
            </button>
        </div>

        {{-- Assign Courses --}}
        <div class="mb-4">
            <label class="block text-gray-700">Assign Courses</label>
            <select name="courses[]" multiple
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ in_array($course->id, $assignedCourses) ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.students.index') }}"
               class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Back
            </a>
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Update
            </button>
        </div>
    </form>
</div>

{{-- Password Toggle Script --}}
<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
@endsection
