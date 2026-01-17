@props(['teacher'])

@php
$isActive = (bool) $teacher->is_active;
@endphp

<div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm
    transition-all duration-300 overflow-hidden
    {{ $isActive ? 'hover:shadow-2xl hover:-translate-y-1' : 'opacity-60 bg-gray-50' }}">

    {{-- Status Badge --}}
    @unless($isActive)
        <span class="absolute top-4 right-4 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
            Inactive
        </span>
    @endunless

    {{-- Avatar --}}
    <div class="flex justify-center pt-8">
        <div class="w-24 h-24 flex items-center justify-center rounded-full text-3xl font-bold shadow-lg
            {{ $isActive ? 'bg-gradient-to-tr from-indigo-600 to-purple-500 text-white' : 'bg-gray-300 text-gray-500' }}">
            {{ strtoupper(substr($teacher->name, 0, 1)) }}
        </div>
    </div>

    {{-- Content --}}
    <div class="text-center px-6 pb-8 pt-6">
        <h3 class="text-lg font-bold text-gray-900">{{ $teacher->name }}</h3>

        <span class="inline-block mt-2 px-4 py-1 rounded-full text-xs font-semibold
            {{ $isActive ? 'bg-indigo-50 text-indigo-600' : 'bg-gray-200 text-gray-400' }}">
            {{ $teacher->subject }}
        </span>

        {{-- Contact --}}
        <div class="mt-6 pt-6 border-t border-gray-100 space-y-3 text-sm text-gray-500">
            <div class="flex items-center justify-center gap-2
                {{ $isActive ? 'hover:text-indigo-600 cursor-pointer transition' : '' }}">
                <span>📞</span>
                <span>{{ $teacher->phone }}</span>
            </div>

            <div class="flex items-center justify-center gap-2
                {{ $isActive ? 'hover:text-indigo-600 cursor-pointer transition' : '' }}">
                <span>✉</span>
                <span>{{ $teacher->email }}</span>
            </div>
        </div>
    </div>
</div>
