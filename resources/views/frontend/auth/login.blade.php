@extends('frontend.layout.app')

@section('title', 'User Login')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.login.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email"
                value="{{ old('email') }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4 relative">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <!-- Wrapper div to position emoji -->
            <div class="relative">
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 pr-10">

                <!-- Emoji Button -->
                <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-2 flex items-center text-gray-500 text-xl hover:text-gray-700">
                    👁️
                </button>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700 transition">
            Login
        </button>
    </form>

    <p class="mt-4 text-center text-gray-700">
        Don't have an account? 
        <a href="{{ route('user.register') }}" class="text-indigo-600 hover:underline">Register here</a>
    </p>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle emoji
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>
@endsection
