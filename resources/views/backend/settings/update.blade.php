<form method="POST" action="{{ route('admin.settings.update', $admin->id) }}">
    @csrf
    @method('PUT')

    {{-- Name --}}
    <div class="mb-5">
        <label class="block font-semibold mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $admin->name) }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
    </div>

    {{-- Email --}}
    <div class="mb-5">
        <label class="block font-semibold mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $admin->email) }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
    </div>

    {{-- Old Password --}}
    <div class="relative mb-5">
        <label class="block font-semibold mb-2">Old Password</label>
        <input id="old_password" type="password" name="old_password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
        <span onclick="togglePassword('old_password', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
            <i class="fa-solid fa-eye"></i>
        </span>
    </div>

    {{-- New Password --}}
    <div class="relative mb-5">
        <label class="block font-semibold mb-2">New Password</label>
        <input id="password" type="password" name="password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        <span onclick="togglePassword('password', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
            <i class="fa-solid fa-eye"></i>
        </span>
    </div>

    {{-- Confirm New Password --}}
    <div class="relative mb-6">
        <label class="block font-semibold mb-2">Confirm New Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        <span onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-9 text-gray-500 cursor-pointer">
            <i class="fa-solid fa-eye"></i>
        </span>
    </div>

    <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition">
        Update Profile
    </button>
</form>
