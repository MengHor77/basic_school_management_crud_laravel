@props(['myCourse', 'enrolledCourseIds'])

<div class="bg-white rounded-xl shadow-sm border hover:shadow-md transition">

    <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-900">
            {{ $myCourse->course->title }}
        </h3>

        <p class="mt-3 text-sm text-gray-600 leading-relaxed">
            {{ Str::limit($myCourse->course->description, 130) }}
        </p>

        <div class="mt-4 text-sm text-gray-500">
            📅 {{ $myCourse->course->start_date }} → {{ $myCourse->course->end_date }}
        </div>

        {{-- ================= ACTIONS (AUTH ONLY) ================= --}}
        @auth
        <div class="mt-6 flex gap-3">
            {{-- View Course --}}
            <x-viewCourseButton :courseId="$myCourse->course->id" />

            {{-- Remove Course --}}
            <x-removeCourseButton :myCourseId="$myCourse->id" />
        </div>
        @endauth

    </div>
</div>
