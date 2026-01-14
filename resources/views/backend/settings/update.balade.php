@extends('backend.layouts.app')

@section('title', 'Update Profile')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
<div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded shadow text-center">
    {{ session('success') }}
</div>
@endif

{{-- ERROR MESSAGE --}}
@if($errors->any())
<div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow text-center">
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif




<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg mt-12">
    <h2 class="text-3xl font-bold mb-8 text-indigo-600 text-center">Update Admin Profile</h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
    <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded shadow">
        {{ session('success') }}
    </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
    <div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update', $admin->id) }}">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
        </div>

        {{-- Email --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
        </div>

        {{-- Password --}}
        <div class="relative mb-5">
            <label class="block font-semibold mb-2">New Password</label>
            <input id="password" type="password" name="password"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            <span onclick="togglePassword('password', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        {{-- Confirm Password --}}
        <div class="relative mb-6">
            <label class="block font-semibold mb-2">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            <span onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition">
            Update Profile
        </button>
    </form>
</div>

<script>
function togglePassword(inputId, iconSpan) {
    const input = document.getElementById(inputId);
    const icon = iconSpan.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

@endsection
