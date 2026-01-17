@props(['course', 'enrolledCourseIds'])

<div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">

    {{-- Thumbnail --}}
    <div class="relative h-52 overflow-hidden">
        <img src="{{ asset('storage/course/course.png') }}" alt="Course Image"
            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
        <span class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
            Featured
        </span>
    </div>

    {{-- Content --}}
    <div class="p-6 flex flex-col h-full">
        <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">
            {{ $course->title }}
        </h3>

        <p class="mt-3 text-sm text-gray-600 leading-relaxed line-clamp-3">
            {{ Str::limit($course->description, 130) }}
        </p>

        {{-- Meta Info --}}
        <div class="mt-6 space-y-3 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <span class="text-indigo-600">📅</span>
                <span>{{ $course->start_date }} – {{ $course->end_date }}</span>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-indigo-600">👥</span>
                    <span>{{ $course->capacity }} Students</span>
                </div>

                <span class="text-indigo-600 font-bold text-lg">FREE</span>
            </div>
        </div>

        {{-- Action --}}
        <div class="mt-8 pt-6 border-t border-gray-100">
            @auth
                @if(in_array($course->id, $enrolledCourseIds))
                    <x-enrollButton enrolled />
                @else
                    <x-enrollButton :courseId="$course->id" />
                @endif
            @else
                <a href="{{ route('user.login') }}"
                    class="block text-center w-full py-3 rounded-xl bg-gray-900 text-white text-sm font-semibold
                    hover:bg-gray-800 transition shadow-lg shadow-gray-200">
                    Login to Enroll
                </a>
            @endauth
        </div>
    </div>
</div>
