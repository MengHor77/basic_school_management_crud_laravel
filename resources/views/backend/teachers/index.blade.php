@extends('backend.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Teachers List</h1>

    <a href="{{ route('admin.teachers.create') }}" 
       class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
       Add New Teacher
    </a>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                    <th class="py-3 px-6 border-b border-gray-300">ID</th>
                    <th class="py-3 px-6 border-b border-gray-300">Name</th>
                    <th class="py-3 px-6 border-b border-gray-300">Email</th>
                    <th class="py-3 px-6 border-b border-gray-300">Subject</th>
                    <th class="py-3 px-6 border-b border-gray-300">Active</th>
                    <th class="py-3 px-6 border-b border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6 border-b border-gray-300">{{ $teacher->id }}</td>
                        <td class="py-3 px-6 border-b border-gray-300">
                            <a href="{{ route('admin.teachers.show', $teacher->id) }}" 
                               class="text-blue-600 hover:underline">
                               {{ $teacher->name }}
                            </a>
                        </td>
                        <td class="py-3 px-6 border-b border-gray-300">{{ $teacher->email }}</td>
                        <td class="py-3 px-6 border-b border-gray-300">{{ $teacher->subject ?? '-' }}</td>
                        <td class="py-3 px-6 border-b border-gray-300">
                            {{ $teacher->is_active ? 'Yes' : 'No' }}
                        </td>
                        <td class="py-3 px-6 border-b border-gray-300 space-x-2">
                            {{-- View --}}
                            <a href="{{ route('admin.teachers.show', $teacher->id) }}"
                               class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                View
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}" 
                               class="inline-block px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-sm">
                               Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    onclick="return confirm('Are you sure?')" 
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-pagination :paginator="$teachers" />

@endsection
