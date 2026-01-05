<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Frontend')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 antialiased">

    <!-- ================= HEADER ================= -->
    <header class="bg-indigo-300 shadow-sm border-b">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo / Title -->
            <h1 class="text-xl font-bold text-indigo-600">
                School Management
            </h1>

            <!-- Auth Area -->
            <div class="flex items-center gap-4">
                @auth('web')
                <!-- Profile -->
                <img src="{{ asset('storage/profile/' . (Auth::guard('web')->user()->image ?? 'image.png')) }}"
                    class="w-10 h-10 rounded-full border border-gray-300 object-cover">

                <!-- Logout -->
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                        Logout
                    </button>
                </form>
                @else
                <a href="{{ route('user.login') }}"
                    class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                    Login
                </a>

                <img src="{{ asset('storage/profile/image.png') }}"
                    class="w-10 h-10 rounded-full border border-gray-300 object-cover">
                @endauth
            </div>

        </div>
    </header>

    <!-- ================= NAVIGATION ================= -->
    <nav class="bg-indigo-600">
        <div class="container mx-auto px-6">
            <ul class="flex gap-6 py-3 text-sm font-medium text-white">
                <li>
                    <a href="{{ route('frontend.home') }}" class="hover:text-indigo-200 transition">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.myCourse') }}" class="hover:text-indigo-200 transition">
                        My Courses
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}" class="hover:text-indigo-200 transition">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}" class="hover:text-indigo-200 transition">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="container mx-auto px-6 py-8 min-h-[70vh]">
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-indigo-300 border-t">
        <div class="container mx-auto px-6 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} School Management System. All rights reserved.
        </div>
    </footer>

</body>

</html>