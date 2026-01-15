<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Frontend')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    html {
        scroll-behavior: smooth;
    }
</style>

</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- ================= HEADER ================= --}}
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <h1 class="text-xl font-extrabold text-indigo-600 tracking-wide">
                School Management
            </h1>

            {{-- Auth --}}
            <div class="flex items-center gap-4">
                @auth('web')
                    <img src="{{ asset('storage/profile/' . (Auth::guard('web')->user()->image ?? 'image.png')) }}"
                        class="w-10 h-10 rounded-full border object-cover">

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
                        class="w-10 h-10 rounded-full border object-cover">
                @endauth
            </div>
        </div>
    </header>

    {{-- ================= NAVIGATION ================= --}}
    <nav class="bg-indigo-600">
        <div class="container mx-auto px-6">
            <ul class="flex items-center gap-3 py-4 text-sm font-semibold text-white">

                @php
                    $activeClass = 'bg-white text-indigo-600 shadow rounded-full px-5 py-2';
                    $normalClass = 'px-5 py-2 rounded-full hover:bg-indigo-500 transition';
                @endphp

                <li>
                    <a href="{{ route('frontend.home') }}"
                        class="{{ request()->routeIs('frontend.home') ? $activeClass : $normalClass }}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('frontend.myCourse') }}"
                        class="{{ request()->routeIs('frontend.myCourse') ? $activeClass : $normalClass }}">
                        My Courses
                    </a>
                </li>

                <li>
                    <a href="{{ route('frontend.about') }}"
                        class="{{ request()->routeIs('frontend.about') ? $activeClass : $normalClass }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('frontend.contact') }}"
                        class="{{ request()->routeIs('frontend.contact') ? $activeClass : $normalClass }}">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- ================= MAIN ================= --}}
   
    <main class="container mx-auto px-6 py-10 min-h-[70vh]">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-300 text-green-700 flex items-center gap-3">
            <i class="fa fa-check-circle text-green-600"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-100 border border-red-300 text-red-700 flex items-center gap-3">
            <i class="fa fa-exclamation-circle text-red-600"></i>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    @yield('content')
</main>


    {{-- ================= FOOTER ================= --}}
    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Brand --}}
            <div>
                <h2 class="text-xl font-bold text-white mb-2">
                    School Management System
                </h2>
                <p class="text-sm text-gray-400">
                    Empowering education with modern technology and professional learning solutions.
                </p>
            </div>

            {{-- Links --}}
            <div class="flex flex-col gap-3 text-sm font-medium">
                <a href="{{ route('frontend.home') }}" class="hover:text-white transition">Home</a>
                <a href="{{ route('frontend.myCourse') }}" class="hover:text-white transition">My Courses</a>
                <a href="{{ route('frontend.about') }}" class="hover:text-white transition">About</a>
                <a href="{{ route('frontend.contact') }}" class="hover:text-white transition">Contact</a>
            </div>

            {{-- Social --}}
            <div class="flex items-center gap-5">
                <a href="#" class="hover:text-blue-500 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-sky-400 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-pink-500 transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="border-t border-gray-700 text-center py-4 text-sm text-gray-400">
            &copy; {{ date('Y') }} School Management System. All rights reserved.
        </div>
    </footer>

</body>
</html>
