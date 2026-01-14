@extends('backend.layouts.app')

@section('title', 'Profile Settings')

@section('content')

<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg mt-12">

    <h2 class="text-3xl font-bold mb-8 text-indigo-600 text-center">
        Admin Profile
    </h2>

    {{-- ================= SUCCESS & ERROR MESSAGES ================= --}}
    @if(session('success'))
    <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded shadow text-center">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mb-6 bg-red-100 text-red-800 px-4 py-3 rounded shadow text-center">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- ================= BUTTONS TOGGLE ================= --}}
    <div class="flex justify-between mb-6 gap-4">
        <button id="showUpdate" class="flex-1 bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition">
            Update Profile
        </button>
        <button id="showDelete" class="flex-1 bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition">
            Delete Account
        </button>
    </div>

    {{-- ================= FORMS ================= --}}
    <div id="updateSection">
        @include('backend.settings.update')
    </div>

    <div id="deleteSection" class="hidden mt-6 border-t pt-6">
        @include('backend.settings.delete')
    </div>

</div>

{{-- ================= SCRIPTS ================= --}}
<script>
    // Toggle password visibility
    function togglePassword(inputId, iconSpan) {
        const input = document.getElementById(inputId);
        const icon = iconSpan.querySelector('i');
        if(input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Delete confirmation
    function confirmDelete() {
        const password = document.getElementById('delete_password').value;
        if(!password) {
            alert('Please enter your password to confirm deletion.');
            return false;
        }
        return confirm('Are you sure you want to delete your account? This action cannot be undone.');
    }

    // Toggle between sections
    const updateSection = document.getElementById('updateSection');
    const deleteSection = document.getElementById('deleteSection');

    document.getElementById('showUpdate').addEventListener('click', () => {
        updateSection.classList.remove('hidden');
        deleteSection.classList.add('hidden');
    });

    document.getElementById('showDelete').addEventListener('click', () => {
        updateSection.classList.add('hidden');
        deleteSection.classList.remove('hidden');
    });
</script>

@endsection
