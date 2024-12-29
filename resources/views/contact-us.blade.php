@extends('layouts.guest')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">Contact Us - {{ config('app.name', 'TaskMastery') }}</h1>
    <p class="mb-6 text-center">
        We’d love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out.
    </p>

    <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="message" class="block text-gray-700">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded" required></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Send Message</button>
    </form>
@endsection
