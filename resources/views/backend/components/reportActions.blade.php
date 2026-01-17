@props(['student'])

<div class="flex gap-2">
    <a href="{{ route('admin.reports.show', $student->id) }}"
       class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm">
       View
    </a>
</div>
