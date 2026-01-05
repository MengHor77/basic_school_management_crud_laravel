@extends('frontend.layout.app')

@section('title', 'User Login')

@section('content')

<div class="min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border p-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
            <p class="text-sm text-gray-500 mt-1">Sign in to continue</p>
        </div>

        {{-- Error Messages --}}
        @if($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-700">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Login Form --}}
        <form action="{{ route('user.login.submit') }}" method="POST" class="space-y-5">
            @csrf

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

                    {{-- Toggle Icon --}}
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute inset-y-0 right-3 flex items-center text-xl text-gray-500 hover:text-gray-700 transition">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full py-3 rounded-lg
                bg-indigo-600 text-white text-sm font-semibold
                hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-indigo-400
                transition">
                Login
            </button>
        </form>

        {{-- Footer --}}
        <div class="mt-6 text-center text-sm text-gray-600">
            Don’t have an account?
            <a href="{{ route('user.register') }}" class="text-indigo-600 font-semibold hover:underline">
                Register here
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
</script>

@endsection
