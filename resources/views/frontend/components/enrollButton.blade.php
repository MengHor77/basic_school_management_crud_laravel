@props(['courseId' => null, 'enrolled' => false])

@if($enrolled)
    <button disabled
        class="w-full py-3 rounded-xl bg-gray-100 text-gray-400 text-sm font-semibold cursor-not-allowed">
        Enrolled
    </button>
@else
    <form action="{{ route('courses.enroll', $courseId) }}" method="POST">
        @csrf
        <button
            class="w-full py-3 rounded-xl bg-indigo-600 text-white text-sm font-semibold
            hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 active:scale-95">
            Enroll Now
        </button>
    </form>
@endif
