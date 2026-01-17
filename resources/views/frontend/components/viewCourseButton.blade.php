@props(['courseId'])

<a href="{{ route('frontend.myCourse.showCourse', $courseId) }}" 
   class="flex-1 inline-flex items-center justify-center gap-2
          py-2.5 rounded-lg
          bg-indigo-600 text-white text-sm font-semibold
          hover:bg-indigo-700
          focus:outline-none focus:ring-2 focus:ring-indigo-400
          transition">
    View Course
</a>
