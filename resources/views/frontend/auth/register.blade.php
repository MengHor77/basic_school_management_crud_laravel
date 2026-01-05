@extends('frontend.layout.app')

@section('title', 'User Register')

@section('content')

<div class="min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border p-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
            <p class="text-sm text-gray-500 mt-1">Sign up to access all courses</p>
        </div>

        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-700">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Registration Form --}}
        <form action="{{ route('user.register.submit') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Full Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-12
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute inset-y-0 right-3 flex items-center text-xl text-gray-500 hover:text-gray-700 transition">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-12
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <button
                        type="button"
                        id="toggleConfirmPassword"
                        class="absolute inset-y-0 right-3 flex items-center text-xl text-gray-500 hover:text-gray-700 transition">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="w-full py-3 rounded-lg
                bg-indigo-600 text-white text-sm font-semibold
                hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-indigo-400
                transition">
                Register
            </button>
        </form>

        {{-- Login Link --}}
        <div class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('user.login') }}" class="text-indigo-600 font-semibold hover:underline">
                Login here
            </a>
        </div>
    </div>
</div>

{{-- Password Toggle Script --}}
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        const isPassword = password.type === 'password';
        password.type = isPassword ? 'text' : 'password';
        togglePassword.textContent = isPassword ? '🙈' : '👁️';
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('password_confirmation');

    toggleConfirmPassword.addEventListener('click', () => {
        const isPassword = confirmPassword.type === 'password';
        confirmPassword.type = isPassword ? 'text' : 'password';
        toggleConfirmPassword.textContent = isPassword ? '🙈' : '👁️';
    });
</script>

@endsection
