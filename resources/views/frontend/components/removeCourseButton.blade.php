@props(['myCourseId'])

<form action="{{ route('myCourse.remove', $myCourseId) }}" method="POST" class="flex-1">
    @csrf
    <button type="submit" 
            class="w-full inline-flex items-center justify-center gap-2
                   py-2.5 rounded-lg
                   bg-red-600 text-white text-sm font-semibold
                   hover:bg-red-700
                   focus:outline-none focus:ring-2 focus:ring-red-400
                   transition">
        Remove Course
    </button>
</form>
