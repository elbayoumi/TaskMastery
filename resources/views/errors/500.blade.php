@extends('layouts.guest')

@section('content')
<div class="text-center py-24">
    <h1 class="text-6xl font-bold text-gray-800 dark:text-gray-100">500</h1>
    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
        Oops! Something went wrong on our end. Please try again later.
    </p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
        Go Back Home
    </a>
</div>
@endsection
