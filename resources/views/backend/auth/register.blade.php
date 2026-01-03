<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

        {{-- Display Validation Errors --}}
        @if($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block mb-1 font-medium">Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block mb-1 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                Register
            </button>
        </form>

        {{-- Login Link --}}
        <div class="mt-6 text-center">
            <p class="text-sm">
                Already have an account? 
                <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:underline font-semibold">
                    Login
                </a>
            </p>
        </div>
    </div>

</body>
</html>
