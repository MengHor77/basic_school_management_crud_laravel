@extends('frontend.layout.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-4xl mx-auto mt-12 p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Contact Us</h2>
    <p class="text-gray-600 mb-8 text-center">
        Have any questions or concerns? Fill out the form below and we'll get back to you as soon as possible.
    </p>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-md shadow">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('frontend.contact.submit') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="John Doe" required>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="john@example.com" required>
        </div>

        {{-- Subject --}}
        <div>
            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Subject" required>
        </div>

        {{-- Message --}}
        <div>
            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea name="message" id="message" rows="6"
                class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Type your message here..." required>{{ old('message') }}</textarea>
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-md shadow hover:bg-indigo-700 transition duration-300">
                Send Message
            </button>
        </div>
    </form>

    {{-- Optional Contact Info --}}
    <div class="mt-12 grid md:grid-cols-3 gap-6 text-gray-700 text-center">
        <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
            <h3 class="font-semibold mb-2">Email</h3>
            <p>piseth125125@gmail.com</p>
        </div>
        <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
            <h3 class="font-semibold mb-2">Phone</h3>
            <p>+1 234 567 890</p>
        </div>
        <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
            <h3 class="font-semibold mb-2">Address</h3>
            <p>123 Main Street, Phnom Penh, Cambodia</p>
        </div>
    </div>

    {{-- ================= GOOGLE MAP ================= --}}
    <div class="mt-12">
        <h3 class="text-xl font-semibold mb-4 text-center">Our Location</h3>
        <div class="w-full h-64 rounded-lg overflow-hidden shadow">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.849811234567!2d104.9023456!3d11.5678901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951234567890%3A0x123456789abcdef!2s123%20Main%20Street%2C%20Phnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sus!4v1699999999999!5m2!1sen!2sus" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

</div>
@endsection
