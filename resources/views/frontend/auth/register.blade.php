@extends('frontend.layout.app')

@section('title', 'User Register')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.register.submit') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" id="name" 
                value="{{ old('name') }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email"
                value="{{ old('email') }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Password -->
        <div class="mb-4 relative">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <div class="relative">
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 pr-10">

                <!-- Emoji Toggle -->
                <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-2 flex items-center text-gray-500 text-xl hover:text-gray-700">
                    👁️
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4 relative">
            <label for="password_confirmation" class="block mb-1 font-semibold">Confirm Password</label>
            <div class="relative">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 pr-10">

                <!-- Emoji Toggle -->
                <button type="button" id="toggleConfirmPassword"
                    class="absolute inset-y-0 right-2 flex items-center text-gray-500 text-xl hover:text-gray-700">
                    👁️
                </button>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700 transition">
            Register
        </button>
    </form>

    <!-- Link to Login -->
    <p class="mt-4 text-center text-gray-700">
        Already have an account? 
        <a href="{{ route('user.login') }}" class="text-indigo-600 hover:underline">Login here</a>
    </p>
</div>

<!-- Script for toggle password -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });

    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#password_confirmation');

    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>
@endsection
