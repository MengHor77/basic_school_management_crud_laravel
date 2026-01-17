@props(['text', 'link', 'primary' => true])

<a href="{{ $link }}"
    class="inline-flex items-center justify-center px-8 py-3 rounded-xl 
    {{ $primary ? 'bg-indigo-600 text-white shadow-lg hover:bg-indigo-700' : 'border border-indigo-300 text-indigo-100 hover:bg-white/10' }}
    font-semibold transition-all">
    {{ $text }}
</a>
