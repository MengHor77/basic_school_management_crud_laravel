@extends('frontend.layout.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-4xl mx-auto mt-12 p-6 bg-white rounded-xl shadow-lg">

    {{-- Page Header --}}
    <x-contactHeader title="Contact Us"
        description="Have any questions or concerns? Fill out the form below and we'll get back to you as soon as possible." />

    {{-- Alerts --}}
    <x-alertMessage type="success" :messages="session('success')" />
    <x-alertMessage type="error" :messages="$errors->all()" />

    {{-- Contact Form --}}
    <x-contactForm action="{{ route('frontend.contact.submit') }}" buttonText="Send Message" />

    {{-- Contact Info Cards --}}
    <div class="mt-12 grid md:grid-cols-3 gap-6 text-gray-700 text-center">
        <x-cardContactInfo title="Email" value="piseth125125@gmail.com" icon="📧" />
        <x-cardContactInfo title="Phone" value="+1 234 567 890" icon="📞" />
        <x-cardContactInfo title="Address" value="123 Main Street, Phnom Penh, Cambodia" icon="🏠" />
    </div>

    {{-- Google Map --}}
    <x-googleMap
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.849811234567!2d104.9023456!3d11.5678901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951234567890%3A0x123456789abcdef!2s123%20Main%20Street%2C%20Phnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sus!4v1699999999999!5m2!1sen!2sus"
        height="64" />

</div>
@endsection