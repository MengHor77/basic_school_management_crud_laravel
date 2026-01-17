@extends('backend.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Welcome Section -->
    <x-welcomeAdmin />

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <x-statCard 
            title="Total Students" 
            :count="$totalStudents" 
            icon="fas fa-user" 
            bgFrom="from-blue-500" 
            bgTo="to-blue-600" 
            text="All Frontend Users" 
        />
        <x-statCard 
            title="Enrollments Today" 
            :count="$enrollmentsToday" 
            icon="fas fa-calendar-day" 
            bgFrom="from-green-500" 
            bgTo="to-green-600" 
            text="Today" 
        />
        <x-statCard 
            title="Total Courses" 
            :count="$totalCourses" 
            icon="fas fa-book" 
            bgFrom="from-yellow-400" 
            bgTo="to-yellow-500" 
            text="All Courses" 
        />
    </div>

    <!-- Quick Links Section -->
    <x-quickLink />

</div>
@endsection
