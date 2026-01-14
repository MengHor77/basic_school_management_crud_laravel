@extends('backend.layouts.app')

@section('title', 'Profile Settings')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-6 text-indigo-600">
        Admin Profile Settings
    </h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
    <div class="mb-4 bg-red-100 text-red-800 px-4 py-2 rounded">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- UPDATE FORM --}}
    <form method="POST" action="{{ route('admin.settings.update', $admin->id) }}">
        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- EMAIL --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- PASSWORD --}}
        <div class="relative mb-4">
            <label class="block font-semibold mb-1">New Password</label>
            <input id="password" type="password" name="password" class="w-full border rounded px-3 py-2 pr-10">
            <span onclick="togglePassword('password', this)" class="absolute right-3 top-9 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="relative mb-6">
            <label class="block font-semibold mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full border rounded px-3 py-2 pr-10">
            <span onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-9 cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </span>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">
            Update Account
        </button>
    </form>

    {{-- DELETE FORM (SEPARATE) --}}
    <form method="POST" action="{{ route('admin.settings.destroy', $admin->id) }}" class="mt-4"
        onsubmit="return confirm('Are you sure you want to delete your account?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Delete Account
        </button>
    </form>

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
</script>

@endsection