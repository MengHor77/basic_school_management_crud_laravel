@extends('backend.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-2">Welcome, {{ Auth::guard('admin')->user()->name }}!</h2>
        <p class="text-gray-600">Here is a quick overview of your system.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Users Card -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow-lg p-5 flex flex-col justify-between hover:scale-105 transform transition duration-300">
            <div>
                <h3 class="text-lg font-medium opacity-80">Total Users</h3>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\User::where('is_delete', 0)->count() }}</p>
            </div>
            <div class="mt-4 text-sm opacity-80 flex items-center gap-1">
                👤 All Frontend Users
            </div>
        </div>

        <!-- Today's Enrollments Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg shadow-lg p-5 flex flex-col justify-between hover:scale-105 transform transition duration-300">
            <div>
                <h3 class="text-lg font-medium opacity-80">Enrollments Today</h3>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\MyCourse::whereDate('created_at', now())->count() }}</p>
            </div>
            <div class="mt-4 text-sm opacity-80 flex items-center gap-1">
                📅 Today
            </div>
        </div>

        <!-- Total Courses Card -->
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-lg shadow-lg p-5 flex flex-col justify-between hover:scale-105 transform transition duration-300">
            <div>
                <h3 class="text-lg font-medium opacity-80">Total Courses</h3>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Course::count() }}</p>
            </div>
            <div class="mt-4 text-sm opacity-80 flex items-center gap-1">
                📚 All Courses
            </div>
        </div>

    </div>

    <!-- Quick Links Section -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.teachers.index') }}" class="block bg-indigo-600 text-white p-4 rounded hover:bg-indigo-700 transition">
                Manage Teacher 
            </a>
            <a href="{{ route('admin.students.index') }}" class="block bg-green-600 text-white p-4 rounded hover:bg-green-700 transition">
                Manage Students
            </a>
            <a href="{{ route('admin.courses.index') }}" class="block bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600 transition">
                Manage Courses
            </a>
        </div>
    </div>

</div>
@endsection
