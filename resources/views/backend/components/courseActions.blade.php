@props(['course'])

<a href="{{ route('admin.courses.edit', $course->id) }}"
    class="inline-block px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-sm">
    Edit
</a>

<form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Are you sure?')"
        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
        Delete
    </button>
</form>
