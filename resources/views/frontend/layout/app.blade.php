<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Frontend')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-indigo-600 text-white p-4 flex justify-between items-center">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">Welcome to School Management!</h1>
        </div>

        <div class="flex flex-col items-center">
            @auth('web') {{-- Check if frontend user is logged in --}}
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>

                <a href="#">
                    <img src="{{ asset('storage/profile/' . Auth::guard('web')->user()->image ?? 'image.png') }}"
                        alt="Profile"
                        class="w-10 h-10 rounded-full border border-white hover:ring-2 hover:ring-white transition mt-1">
                </a>
            @else
                <a href="{{ route('user.login') }}" class="hover:underline">Login</a>
                <a href="{{ route('user.login') }}">
                    <img src="{{ asset('storage/profile/image.png') }}" alt="Profile"
                        class="w-10 h-10 rounded-full border border-white hover:ring-2 hover:ring-white transition mt-1">
                </a>
            @endauth
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-indigo-500 text-white p-2">
        <div class="container mx-auto flex space-x-6">
            <a href="{{ route('frontend.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('frontend.about') }}" class="hover:underline">About</a>
            <a href="{{ route('frontend.contact') }}" class="hover:underline">Contact</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>

</body>

</html>
