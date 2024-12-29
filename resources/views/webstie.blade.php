@extends('layouts.guest')

@section('content')
<div class="space-y-12">
    <!-- Hero Section -->
    <section class="text-center py-12 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 dark:text-gray-100">
            Boost Productivity with the Best Free Task Management Tool by {{ config('app.name', 'TaskMastery') }}
        </h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
            Manage your tasks, collaborate with your team, and achieve your goals faster. Check out <a href="https://example.com/productivity-tips" class="text-blue-500 underline" target="_blank">our top productivity tips</a>.
        </p>
        <a href="{{ route('register') }}" class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
            Get Started for Free
        </a>
    </section>

    <!-- Features Section -->
    <section class="py-12 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100">Why Choose {{ config('app.name', 'TaskMastery') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <!-- Feature 1 -->
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21H4a2 2 0 01-2-2V7m18 11h-5a2 2 0 01-2-2V7m6 4h-4M9 3h6m-6 4h6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Efficient Workflow</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Keep all your tasks and projects organized in one place. <a href="/features/workflow" class="text-blue-500 underline">Learn more</a>.
                    </p>
                </div>
                <!-- Feature 2 -->
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1-8v16m8-9h-4M3 12H7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Real-Time Collaboration</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Work seamlessly with your team in real-time. <a href="/features/collaboration" class="text-blue-500 underline">Discover how</a>.
                    </p>
                </div>
                <!-- Feature 3 -->
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 21H4a2 2 0 01-2-2V7m18 11h-5a2 2 0 01-2-2V7m6 4h-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Customizable Features</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Tailor your experience to suit your unique workflow. <a href="/features/customization" class="text-blue-500 underline">See how it works</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-12 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold">Get Started Today</h3>
            <p class="mt-4">Experience the power of {{ config('app.name', 'TaskMastery') }} with a <a href="/free-trial" class="text-white underline">free trial</a>.</p>
            <a href="{{ route('register') }}" class="mt-6 inline-block px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow hover:bg-gray-100">
                Sign Up for Free
            </a>
        </div>
    </section>

    <!-- Additional Links Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Explore More</h3>
            <ul class="mt-6 space-y-4 text-lg">
                <li><a href="/about" class="text-blue-500 underline">About Us</a></li>
                <li><a href="/contact" class="text-blue-500 underline">Contact Support</a></li>
                <li><a href="/blog" class="text-blue-500 underline">Visit Our Blog</a></li>
            </ul>
        </div>
    </section>
</div>
@endsection
