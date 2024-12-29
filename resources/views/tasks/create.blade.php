<x-app-layout>
    @section('title', 'Create Task')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <!-- Title Input with Emoji -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">📝</span>
                                <input type="text" name="title" id="title" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Description Input with Emoji -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">📝</span>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Due Date Input with Emoji -->
                        <div class="mb-4">
                            <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Due Date</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">📅</span>
                                <input type="date" name="due_date" id="due_date" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Priority Select with Emoji -->
                        <div class="mb-4">
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Priority</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">⚡</span>
                                <select name="priority" id="priority" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status Select with Emoji -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">✅</span>
                                <select name="status" id="status" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="todo">Todo</option>
                                    <option value="doing">Doing</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <x-primary-button class="mt-4">
                            {{ __('Save Task') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
