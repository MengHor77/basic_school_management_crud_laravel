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
        <x-cardOurMission>
            Our mission is to empower students through quality education and innovative learning solutions.
        </x-cardOurMission>

        <x-cardOurVision>
            We envision a world where knowledge is accessible to everyone, enabling personal and professional growth.
        </x-cardOurVision>
    </div>

    <!-- Values Section -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Core Values</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <x-cardOurCoreValues icon="💡" title="Innovation">
                We encourage creativity and forward-thinking solutions.
            </x-cardOurCoreValues>

            <x-cardOurCoreValues icon="🤝" title="Integrity">
                We uphold honesty and transparency in everything we do.
            </x-cardOurCoreValues>

            <x-cardOurCoreValues icon="🌱" title="Growth">
                We support continuous learning and personal development.
            </x-cardOurCoreValues>

            <x-cardOurCoreValues icon="🌐" title="Community">
                We believe in building a strong and supportive community.
            </x-cardOurCoreValues>
        </div>
    </div>

    <!-- Team Section -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <x-cardProfile 
                name="Jane Doe" 
                role="CEO & Founder" 
                image="{{ asset('storage/profile/image.png') }}" 
                description="Passionate about education and innovation." />

            <x-cardProfile 
                name="John Smith" 
                role="Head of Operations" 
                image="{{ asset('storage/profile/image.png') }}" 
                description="Ensures everything runs smoothly and efficiently." />

            <x-cardProfile 
                name="Emily Johnson" 
                role="Lead Developer" 
                image="{{ asset('storage/profile/image.png') }}" 
                description="Builds innovative solutions and oversees tech projects." />
        </div>
    </div>

</div>
@endsection
