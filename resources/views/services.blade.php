@extends('layouts.guest')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">Our Services</h1>
    <p class="mb-6 text-center">Explore the services we offer to help you stay organized and productive.</p>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 py-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-4">Task Management</h2>
            <p class="text-gray-600 dark:text-gray-300">Organize, prioritize, and track your tasks seamlessly.</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-4">Team Collaboration</h2>
            <p class="text-gray-600 dark:text-gray-300">Work together with your team to achieve shared goals.</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-4">Analytics & Reports</h2>
            <p class="text-gray-600 dark:text-gray-300">Get detailed insights into your task progress.</p>
        </div>
    </section>

    <section class="text-center py-6">
        <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
            Get Started for Free
        </a>
    </section>
@endsection
