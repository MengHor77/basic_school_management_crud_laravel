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
        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" id="name" 
                value="{{ old('name') }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email"
                value="{{ old('email') }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <input type="password" name="password" id="password"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-1 font-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

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
@endsection
