<p class="text-gray-700 mb-4 text-center">
    Warning: Deleting your account is <span class="font-bold text-red-600">permanent</span>. Please enter your password to confirm.
</p>

<form method="POST" action="{{ route('admin.settings.destroy', $admin->id) }}" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')

    <div class="mb-4">
        <input type="password" name="delete_password" id="delete_password" placeholder="Enter your current password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none" required>
    </div>

    <button type="submit" class="w-full bg-red-600 text-white font-semibold py-3 rounded-lg hover:bg-red-700 transition">
        Delete Account
    </button>
</form>
