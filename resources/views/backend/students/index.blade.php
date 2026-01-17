@extends('backend.layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-4 text-indigo-600">Students</h2>

    <a href="{{ route('admin.students.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">
        Add New Student
    </a>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    {{-- Student Table Component --}}
    <x-studentTable :students="$students" />
</div>

{{-- Pagination --}}
<!-- Pagination -->
@include('backend.components.pagination', ['paginator' => $students])

@endsection