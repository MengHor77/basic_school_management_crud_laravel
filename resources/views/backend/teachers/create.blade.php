@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
<h1 class="text-3xl font-bold mb-6 text-center">Add New Teacher</h1>

    @if ($errors->any())
        <div class=" mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.teachers.store') }}" method="POST" class=" space-y-6">
        @csrf

        <div>
            <label class="block mb-1 font-semibold" for="name">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                value="{{ old('name') }}" 
                required
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold" for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                value="{{ old('email') }}" 
                required
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold" for="phone">Phone</label>
            <input 
                type="text" 
                name="phone" 
                id="phone"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                value="{{ old('phone') }}"
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold" for="subject">Subject</label>
            <input 
                type="text" 
                name="subject" 
                id="subject"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                value="{{ old('subject') }}"
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold" for="address">Address</label>
            <textarea 
                name="address" 
                id="address"
                rows="4" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('address') }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold" for="is_active">Active</label>
            <select 
                name="is_active" 
                id="is_active"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required
            >
                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="flex space-x-4">
            <button 
                type="submit" 
                class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Save
            </button>
            <a 
                href="{{ route('admin.teachers.index') }}" 
                class="inline-block px-5 py-2 border border-gray-400 rounded hover:bg-gray-100"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
