@extends('backend.layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-md mt-12">
    <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Create Student</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded">
        <strong class="font-semibold">Oops!</strong> Please fix the following errors:
        <ul class="mt-2 list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.students.store') }}" novalidate>
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-1">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter student full name">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter email">
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4 relative">
            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
            <input type="password" id="password" name="password" required
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm pr-10 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter password">
            <button type="button" onclick="togglePassword('password')"
                class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-500 focus:outline-none">
                <i class="fa-solid fa-eye"></i>
            </button>
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-4 relative">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm pr-10 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Re-enter password">
            <button type="button" onclick="togglePassword('password_confirmation')"
                class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-500 focus:outline-none">
                <i class="fa-solid fa-eye"></i>
            </button>
        </div>

        {{-- Assign Courses --}}
        <div class="mb-6">
            <label for="courses" class="block text-gray-700 font-medium mb-1">Assign Courses</label>
            <select name="courses[]" id="courses" multiple
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
            @error('courses')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-sm mt-1">Hold <kbd>Ctrl</kbd> (Windows) or <kbd>Cmd</kbd> (Mac) to select multiple courses.</p>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.students.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-4 py-2 rounded-lg shadow">Back</a>
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2 rounded-lg shadow">Save Student</button>
        </div>
    </form>
</div>

{{-- Password Toggle Script --}}
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
</script>
@endsection
