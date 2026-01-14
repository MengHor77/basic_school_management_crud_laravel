@extends('backend.layouts.app')

@section('title', 'Delete Account')

@section('content')
{{-- SUCCESS MESSAGE --}}
@if(session('success'))
<div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded shadow text-center">
    {{ session('success') }}
</div>
@endif

{{-- ERROR MESSAGE --}}
@if($errors->any())
<div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow text-center">
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg mt-12">
    <h2 class="text-3xl font-bold mb-6 text-red-600 text-center">Delete Admin Account</h2>

    <p class="text-gray-700 mb-6 text-center">
        Warning: Deleting your account is <span class="font-bold text-red-600">permanent</span> and cannot be undone.
        Please enter your password to confirm.
    </p>

    @if($errors->any())
    <div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.destroy', $admin->id) }}" onsubmit="return confirmDelete()">
        @csrf
        @method('DELETE')

        <div class="mb-5">
            <label class="block font-semibold mb-2">Enter Password</label>
            <input type="password" name="delete_password" id="delete_password" placeholder="Your password"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none" required>
        </div>

        <button type="submit"
            class="w-full bg-red-600 text-white font-semibold py-3 rounded-lg hover:bg-red-700 transition">
            Delete Account
        </button>
    </form>
</div>

<script>
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
