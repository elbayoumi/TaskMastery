<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Request::url() === url('/'))
    <link rel="canonical" href="{{ url('/') }}">
@endif

    <title>{{ config('app.name', 'TaskMastery') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/figtree.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            <!-- Breadcrumb navigation -->
            <div class="text-sm ml-3 mb-4">
                <ol class="list-reset flex text-gray-800 dark:text-gray-200">
                    <!-- Link to Home -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-500">🏠 Home</a>
                    </li>
                    <li class="mx-2">/</li>
                    <!-- Current Page -->
                    <li class="text-gray-500">
                        @if (Route::currentRouteName() == 'tasks.create')
                            Create Task
                        @elseif(Route::currentRouteName() == 'tasks.index')
                            Tasks List
                        @else
                            {{ Route::currentRouteName() }}
                        @endif
                    </li>
                </ol>
            </div>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
