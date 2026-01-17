@props([
'title', // Card title
'count', // Numeric value
'icon' => '', // Optional icon (Font Awesome class)
'bgFrom' => 'from-blue-500', // Gradient start
'bgTo' => 'to-blue-600', // Gradient end
'text' => '', // Optional bottom text
])

<div
    class="bg-gradient-to-r {{ $bgFrom }} {{ $bgTo }} text-white rounded-lg shadow-lg p-5 flex flex-col justify-between hover:scale-105 transform transition duration-300">
    <div>
        <h3 class="text-lg font-medium opacity-80">{{ $title }}</h3>
        <p class="text-3xl font-bold mt-2">{{ $count }}</p>
    </div>
    @if($text || $icon)
    <div class="mt-4 text-sm opacity-80 flex items-center gap-1">
        @if($icon)
        <i class="{{ $icon }}"></i>
        @endif
        {{ $text }}
    </div>
    @endif
</div>