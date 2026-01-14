@extends('backend.layouts.app')

@section('title', 'Profile Settings')

@section('content')

<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg mt-12">

    <h2 class="text-3xl font-bold mb-8 text-indigo-600 text-center">
        Admin Profile Settings
    </h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
    <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded shadow">
        {{ session('success') }}
    </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
    <div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- FORM --}}
    <form method="POST" action="{{ route('admin.settings.update', $admin->id) }}">
        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
        </div>

        {{-- EMAIL --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
        </div>

        {{-- PASSWORD --}}
        <div class="relative mb-5">
            <label class="block font-semibold mb-2">New Password</label>
            <input id="password" type="password" name="password"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            <span onclick="togglePassword('password', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="relative mb-6">
            <label class="block font-semibold mb-2">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            <span onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        {{-- BUTTONS IN ROW --}}
        <div class="flex space-x-4">
            <button type="submit"
                class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition">
                Update Account
            </button>

            <button type="button" onclick="document.getElementById('delete-section').classList.toggle('hidden')"
                class="flex-1 bg-red-600 text-white font-semibold py-3 rounded-lg hover:bg-red-700 transition">
                Delete Account
            </button>
        </div>
    </form>

    {{-- DELETE FORM (Initially hidden) --}}
    <div id="delete-section" class="mt-6 border-t pt-6 hidden">
        <h3 class="text-xl font-semibold mb-4 text-red-600">Confirm Deletion</h3>
        <p class="text-gray-600 mb-4">Deleting your account is irreversible. Enter your password to confirm.</p>

        <form method="POST" action="{{ route('admin.settings.destroy', $admin->id) }}" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')

            <div class="mb-4">
                <input type="password" id="delete_password" name="delete_password" placeholder="Enter your password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none" required>
            </div>

            <button type="submit"
                class="w-full bg-red-600 text-white font-semibold py-3 rounded-lg hover:bg-red-700 transition">
                Confirm Delete
            </button>
        </form>
    </div>

</div>

<script>
function togglePassword(inputId, iconSpan) {
    const input = document.getElementById(inputId);
    const icon = iconSpan.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function confirmDelete() {
    const password = document.getElementById('delete_password').value;
    if(!password) {
        alert('Please enter your password to confirm deletion.');
        return false;
    }
    return confirm('Are you sure you want to delete your account? This action cannot be undone.');
}
</script>

@endsection
