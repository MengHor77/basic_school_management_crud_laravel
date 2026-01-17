@extends('backend.layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Courses List</h1>

<a href="{{ route('admin.courses.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Add New Course
</a>

@if(session('success'))
<div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
    {{ session('success') }}
</div>
@endif

{{-- Use the new course table component --}}
<x-courseTable :courses="$courses" />

{{-- Pagination --}}
@include('backend.components.pagination', ['paginator' => $courses])
@endsection
