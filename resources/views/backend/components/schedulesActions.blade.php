@props(['schedule'])

{{-- View --}}
<a href="{{ route('admin.schedule.show', $schedule->id) }}"
    class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
    View
</a>

{{-- Edit --}}
<a href="{{ route('admin.schedule.edit', $schedule->id) }}"
    class="inline-block px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-sm">
    Edit
</a>

{{-- Delete --}}
<form action="{{ route('admin.schedule.destroy', $schedule->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Are you sure?')"
        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
        Delete
    </button>
</form>
