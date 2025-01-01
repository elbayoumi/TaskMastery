<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @if (Request::url() === url('/'))
    <link rel="canonical" href="{{ url('/') }}">
@endif

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic Meta Data -->
    <title>{{ get_meta_data()['title'] ?? 'TaskPro' }}</title>
    <meta name="description" content="{{ get_meta_data()['description'] ?? 'TaskPro is your go-to task management solution.' }}">
    <meta name="keywords" content="{{ get_meta_data()['keywords'] ?? 'task management, productivity, TaskPro' }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ get_meta_data()['title'] ?? 'TaskPro' }}">
    <meta property="og:description" content="{{ get_meta_data()['description'] ?? 'TaskPro helps you manage tasks effectively.' }}">
    <meta property="og:image" content="{{ asset(get_meta_data()['og_image'] ?? 'default-og-image.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="{{ get_meta_data()['title'] ?? 'TaskPro' }}">
    <meta name="twitter:description" content="{{ get_meta_data()['description'] ?? 'TaskPro enhances your productivity.' }}">
    <meta name="twitter:image" content="{{ asset(get_meta_data()['og_image'] ?? 'default-og-image.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/figtree.min.css') }}">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="application/ld+json">
        {!! json_encode(get_meta_data()['schema'] ?? [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Navbar -->
    <header class="bg-gray-800 text-white shadow-md">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('logo.svg') }}" class="h-8" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TaskPro</span>
                </a>
                <!-- Toggle Button for Mobile -->
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <!-- Navbar Menu -->
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/" class="block py-2 px-3 {{ request()->is('/') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                🏠 Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}" class="block py-2 px-3 {{ request()->is('about-us') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                ℹ️ About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="block py-2 px-3 {{ request()->is('services') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                💼 Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy-policy') }}" class="block py-2 px-3 {{ request()->is('privacy-policy') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                🔒 Privacy Policy
                            </a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="block py-2 px-3 {{ request()->is('dashboard') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                📊 Dashboard
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 {{ request()->is('login') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                🔑 Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 px-3 {{ request()->is('register') ? 'text-blue-700' : 'text-gray-900 dark:text-white' }} rounded md:p-0">
                                📝 Register
                            </a>
                        </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <!-- Page Header -->
    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="container mx-auto px-4 text-center">
            <p class="text-3xl font-semibold text-gray-800 dark:text-gray-100">@yield('header_name', 'Welcome to TaskPro')</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="dark:text-white min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="w-full sm:max-w-md lg:max-w-screen-lg xl:max-w-screen-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'TaskPro') }}. All rights reserved.</p>
            <ul class="flex justify-center space-x-4 rtl:space-x-reverse">
                <li><a href="{{ route('about-us') }}" class="hover:underline">About Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="hover:underline">Contact</a></li>
                <li><a href="{{ route('privacy-policy') }}" class="hover:underline">Privacy Policy</a></li>
            </ul>
        </div>
    </footer>

    <!-- JavaScript to Toggle Navbar -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.querySelector('[data-collapse-toggle]');
            const navbarMenu = document.getElementById('navbar-default');

            toggleButton.addEventListener('click', () => {
                navbarMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
