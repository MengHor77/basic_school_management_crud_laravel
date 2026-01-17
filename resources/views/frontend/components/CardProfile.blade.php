@props(['name', 'role', 'image', 'description'])
<div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
    <img src="{{ $image }}" alt="{{ $name }}" class="mx-auto rounded-full mb-4 w-32 h-32 object-cover">
    <h3 class="font-semibold text-lg mb-1">{{ $name }}</h3>
    <p class="text-indigo-600 text-sm mb-2">{{ $role }}</p>
    <p class="text-gray-600 text-sm">{{ $description }}</p>
</div>
