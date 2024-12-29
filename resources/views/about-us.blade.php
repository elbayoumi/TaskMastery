@extends('layouts.guest')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">About Us - {{ config('app.name', 'TaskMastery') }}</h1>
    <p class="mb-6">
        Welcome to {{ config('app.name', 'TaskMastery') }}! Our mission is to simplify your task management process and boost your productivity.
        We provide tools that enable you to organize, track, and complete your tasks effortlessly, whether you are managing personal goals or collaborating with a team.
    </p>

    <h2 class="text-xl font-semibold mb-4">Our Vision</h2>
    <p class="mb-6">
        At {{ config('app.name', 'TaskMastery') }}, we envision a world where task management is no longer a burden.
        Our platform aims to empower individuals and teams to achieve more with less stress and greater efficiency.
    </p>

    <h2 class="text-xl font-semibold mb-4">Our Mission</h2>
    <p class="mb-6">
        Our mission is to provide a powerful, yet simple task management tool that adapts to your needs.
        We strive to make task tracking, prioritization, and collaboration intuitive and accessible for everyone.
    </p>

    <h2 class="text-xl font-semibold mb-4">Why Choose Us?</h2>
    <ul class="list-disc pl-6 mb-6">
        <li><strong>Ease of Use:</strong> Intuitive design for a seamless user experience.</li>
        <li><strong>Real-Time Collaboration:</strong> Stay connected with your team and manage tasks together.</li>
        <li><strong>Customizable Features:</strong> Tailor the platform to fit your unique workflow.</li>
        <li><strong>Secure and Reliable:</strong> Your data is protected with industry-standard encryption and security protocols.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">Our Journey</h2>
    <p class="mb-6">
        Founded in [Year], {{ config('app.name', 'TaskMastery') }} started as a small project to address the challenges of managing tasks efficiently.
        Today, we are proud to serve thousands of users across the globe, helping them stay organized and productive.
    </p>

    <h2 class="text-xl font-semibold mb-4">Meet Our Team</h2>
    <p class="mb-6">
        Our team is a group of passionate individuals dedicated to delivering the best task management experience.
        We believe in continuous improvement and always welcome feedback from our users.
    </p>

    <h2 class="text-xl font-semibold mb-4">Contact Us</h2>
    <p class="mb-6">
        Have questions, feedback, or want to collaborate with us? Reach out to us anytime at
        <a href="mailto:support@example.com" class="text-blue-600 hover:underline">support@example.com</a>.
        We’d love to hear from you!
    </p>

    <h2 class="text-xl font-semibold mb-4">Join Us Today</h2>
    <p>
        Ready to take your task management to the next level? Sign up for free and start organizing your tasks with
        {{ config('app.name', 'TaskMastery') }} today.
    </p>
    <a href="{{ route('register') }}" class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
        Get Started for Free
    </a>
@endsection
