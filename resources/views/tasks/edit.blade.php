<x-app-layout>
    @section('title', 'Edit Task')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- مهم جداً لأننا نقوم بتحديث بيانات المهمة -->

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-700 dark:bg-gray-800 text-gray-200 dark:text-white rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-700 dark:bg-gray-800 text-gray-200 dark:text-white rounded-md shadow-sm">{{ old('description', $task->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Due Date</label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-700 dark:bg-gray-800 text-gray-200 dark:text-white rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Priority</label>
                            <select name="priority" id="priority" class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-700 dark:bg-gray-800 text-gray-200 dark:text-white rounded-md shadow-sm">
                                <option value="high" {{ old('priority', $task->priority->value) == 'high' ? 'selected' : '' }}>High</option>
                                <option value="medium" {{ old('priority', $task->priority->value) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="low" {{ old('priority', $task->priority->value) == 'low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="todo" {{ old('priority', $task->priority->value) == 'todo' ? 'selected' : '' }}>todo</option>
                                    <option value="done" {{ old('priority', $task->priority->value) == 'done' ? 'selected' : '' }}>done</option>
                                    <option value="doing" {{ old('priority', $task->priority->value) == 'doing' ? 'selected' : '' }}>doing</option>
                            </select>
                        </div>
                        <x-primary-button class="">
                            {{ __('Update Task') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
