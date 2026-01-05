@extends('frontend.layout.app')

@section('title', 'About Us')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-4">About Us</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Learn more about our mission, values, and the team dedicated to delivering the best experience.
        </p>
    </div>

    <!-- Mission & Vision -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
        <div class="bg-white shadow-lg rounded-lg p-8 hover:shadow-xl transition duration-300">
            <h2 class="text-2xl font-bold mb-4 text-indigo-600">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed">
                Our mission is to empower students through quality education and innovative learning solutions.
            </p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8 hover:shadow-xl transition duration-300">
            <h2 class="text-2xl font-bold mb-4 text-indigo-600">Our Vision</h2>
            <p class="text-gray-700 leading-relaxed">
                We envision a world where knowledge is accessible to everyone, enabling personal and professional growth.
            </p>
        </div>
    </div>

    <!-- Values Section -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Core Values</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-indigo-50 p-6 rounded-lg text-center hover:bg-indigo-100 transition duration-300">
                <div class="text-indigo-600 text-4xl mb-4">💡</div>
                <h3 class="font-semibold text-lg mb-2">Innovation</h3>
                <p class="text-gray-600 text-sm">We encourage creativity and forward-thinking solutions.</p>
            </div>
            <div class="bg-indigo-50 p-6 rounded-lg text-center hover:bg-indigo-100 transition duration-300">
                <div class="text-indigo-600 text-4xl mb-4">🤝</div>
                <h3 class="font-semibold text-lg mb-2">Integrity</h3>
                <p class="text-gray-600 text-sm">We uphold honesty and transparency in everything we do.</p>
            </div>
            <div class="bg-indigo-50 p-6 rounded-lg text-center hover:bg-indigo-100 transition duration-300">
                <div class="text-indigo-600 text-4xl mb-4">🌱</div>
                <h3 class="font-semibold text-lg mb-2">Growth</h3>
                <p class="text-gray-600 text-sm">We support continuous learning and personal development.</p>
            </div>
            <div class="bg-indigo-50 p-6 rounded-lg text-center hover:bg-indigo-100 transition duration-300">
                <div class="text-indigo-600 text-4xl mb-4">🌐</div>
                <h3 class="font-semibold text-lg mb-2">Community</h3>
                <p class="text-gray-600 text-sm">We believe in building a strong and supportive community.</p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
<img src="{{ asset('storage/profile/image.png') }}" alt="Team Member" class="mx-auto rounded-full mb-4 w-32 h-32 object-cover">                <h3 class="font-semibold text-lg mb-1">Jane Doe</h3>
                <p class="text-indigo-600 text-sm mb-2">CEO & Founder</p>
                <p class="text-gray-600 text-sm">Passionate about education and innovation.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
<img src="{{ asset('storage/profile/image.png') }}" alt="Team Member" class="mx-auto rounded-full mb-4 w-32 h-32 object-cover">                <h3 class="font-semibold text-lg mb-1">John Smith</h3>
                <p class="text-indigo-600 text-sm mb-2">Head of Operations</p>
                <p class="text-gray-600 text-sm">Ensures everything runs smoothly and efficiently.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
<img src="{{ asset('storage/profile/image.png') }}" alt="Team Member" class="mx-auto rounded-full mb-4 w-32 h-32 object-cover">                <h3 class="font-semibold text-lg mb-1">Emily Johnson</h3>
                <p class="text-indigo-600 text-sm mb-2">Lead Developer</p>
                <p class="text-gray-600 text-sm">Builds innovative solutions and oversees tech projects.</p>
            </div>
        </div>
    </div>

</div>
@endsection
