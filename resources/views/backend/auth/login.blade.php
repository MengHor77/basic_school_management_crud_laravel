<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        @if($errors->any())
            <div class="mb-4 text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2" />
                <label for="remember" class="text-sm">Remember Me</label>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm">
                Don't have an account? 
                <a href="{{ route('admin.register') }}" class="text-indigo-600 hover:underline font-semibold">
                    Register
                </a>
            </p>
        </div>
    </div>

</body>
</html>
