<x-app-layout>
    @section('title', 'Dashboard')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📊 {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to TaskEase!") }}
                </div>

                <!-- Cards showing task counts and statuses -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    <!-- Create New Task Card -->
                    <a href="{{ route('tasks.create') }}"
                       class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">Create New Task</p>
                            <span class="text-3xl">➕</span>
                        </div>
                    </a>

                    <!-- Total Tasks Card -->
                    <a href="{{ route('tasks.index') }}"
                       class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">Total Tasks</p>
                            <span class="text-3xl">📋</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $totalTasks }}</p>
                        </div>
                    </a>

                    <!-- In Progress Tasks Card -->
                    <a href="{{ route('tasks.index', ['status' => 'doing']) }}"
                       class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">In Progress</p>
                            <span class="text-3xl">🔄</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $inProgressTasks }}</p>
                        </div>
                    </a>

                    <!-- Completed Tasks Card -->
                    <a href="{{ route('tasks.index', ['status' => 'done']) }}"
                       class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">Completed</p>
                            <span class="text-3xl">✅</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $completedTasks }}</p>
                        </div>
                    </a>

                    <!-- Pending Tasks Card -->
                    <a href="{{ route('tasks.index', ['status' => 'todo']) }}"
                       class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">Pending</p>
                            <span class="text-3xl">⏳</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $pendingTasks }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
