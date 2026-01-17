@props(['student'])

<div class="flex gap-2">
    <a href="{{ route('admin.students.edit', $student->id) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
    <a href="{{ route('admin.students.show', $student->id) }}" class="bg-blue-500 px-2 py-1 rounded text-white">View</a>
    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Delete student?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 px-2 py-1 rounded text-white">Delete</button>
    </form>
</div>
