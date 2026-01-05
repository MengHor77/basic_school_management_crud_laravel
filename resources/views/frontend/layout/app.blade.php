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
<footer class="bg-indigo-300 text-gray-900 py-8">
    <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
        
        <!-- Logo / Brand -->
        <div class="text-center md:text-left">
            <h2 class="text-xl font-bold text-gray-900">School Management System</h2>
            <p class="text-gray-700 text-sm">Empowering education with modern technology</p>
        </div>

        <!-- Navigation Links -->
        <div class="flex gap-6 text-sm">
            <a href="{{ route('frontend.home') }}" class="hover:text-gray-900 transition-colors font-medium">Home</a>
           <a href="{{ route('frontend.myCourse') }}" class="hover:text-gray-900 transition-colors font-medium">My Courses</a>
            <a href="{{ route('frontend.about') }}" class="hover:text-gray-900 transition-colors font-medium">About Us</a>
            <a href="{{ route('frontend.contact') }}" class="hover:text-gray-900 transition-colors font-medium">Contact</a>
        </div>

        <!-- Social Media Icons -->
        <div class="flex gap-4">
            <a href="#" class="hover:text-blue-600 transition-colors" aria-label="Facebook">
                <!-- Facebook SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.463h-1.26c-1.242 0-1.63.772-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-blue-400 transition-colors" aria-label="Twitter">
                <!-- Twitter SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724 9.864 9.864 0 01-3.127 1.195 4.916 4.916 0 00-8.379 4.482A13.938 13.938 0 011.671 3.149 4.917 4.917 0 003.195 9.723a4.897 4.897 0 01-2.228-.616v.062a4.918 4.918 0 003.946 4.827 4.996 4.996 0 01-2.224.084 4.924 4.924 0 004.6 3.417A9.868 9.868 0 010 21.543a13.92 13.92 0 007.548 2.212c9.142 0 14.307-7.721 13.995-14.646A9.935 9.935 0 0024 4.557z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-pink-500 transition-colors" aria-label="Instagram">
                <!-- Instagram SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.344 3.608 1.319.975.975 1.257 2.242 1.319 3.608.058 1.266.07 1.645.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.344 2.633-1.319 3.608-.975.975-2.242 1.257-3.608 1.319-1.266.058-1.645.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.344-3.608-1.319-.975-.975-1.257-2.242-1.319-3.608-.058-1.266-.07-1.645-.07-4.85s.012-3.584.07-4.85c.062-1.366.344-2.633 1.319-3.608.975-.975 2.242-1.257 3.608-1.319C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.78.13 4.65.397 3.68 1.368 2.71 2.338 2.443 3.468 2.385 4.74.014 8.332 0 8.741 0 12s.014 3.668.072 4.948c.058 1.272.325 2.402 1.296 3.372.97.97 2.1 1.238 3.372 1.296C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.272-.058 2.402-.325 3.372-1.296.97-.97 1.238-2.1 1.296-3.372.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.058-1.272-.325-2.402-1.296-3.372-.97-.97-2.1-1.238-3.372-1.296C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.881 0 1.44 1.44 0 012.881 0z"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-6 text-center text-gray-800 text-sm">
        &copy; {{ date('Y') }} School Management System. All rights reserved.
    </div>
</footer>


</body>

</html>