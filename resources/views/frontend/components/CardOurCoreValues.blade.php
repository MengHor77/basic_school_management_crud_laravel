@props(['icon', 'title'])
<div class="bg-indigo-50 p-6 rounded-lg text-center hover:bg-indigo-100 transition duration-300">
    <div class="text-indigo-600 text-4xl mb-4">{{ $icon }}</div>
    <h3 class="font-semibold text-lg mb-2">{{ $title }}</h3>
    <p class="text-gray-600 text-sm">{{ $slot }}</p>
</div>
