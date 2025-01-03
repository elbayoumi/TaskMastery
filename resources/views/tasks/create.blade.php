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
                    <!-- Form -->
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <!-- Title Input -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">📝</span>
                                <input type="text" name="title" id="title" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Prompt Input -->
                        <div class="mb-4">
                            <label for="prompt" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Prompt to ai</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">💡</span>
                                <textarea name="prompt" id="prompt" rows="3" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                <button type="button" id="generateButton" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">
                                    Generate
                                </button>
                            </div>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Due Date Input -->
                        <div class="mb-4">
                            <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Due Date</label>
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-500 dark:text-gray-300">📅</span>
                                <input type="date" name="due_date" id="due_date" class="mt-1 block w-full border-2 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Priority Select -->
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

                        <!-- Status Select -->
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

                    <!-- Popup -->
                    <div id="popup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Generated Data</h3>
                            <p id="generatedContent" class="text-gray-700 dark:text-gray-300 mb-4"></p>
                            <div class="flex justify-end">
                                <button id="acceptButton" class="bg-green-500 text-white px-4 py-2 rounded mr-2">
                                    Accept
                                </button>
                                <button id="cancelButton" class="bg-red-500 text-white px-4 py-2 rounded">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('generateButton').addEventListener('click', async function () {
            // جلب محتوى البرومبت
            const prompt = document.getElementById('prompt').value;

            if (!prompt.trim()) {
                alert('Please enter a prompt!');
                return;
            }

            try {
                // إرسال الطلب إلى API
                const response = await fetch('{{ route('generate-content') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ text: prompt }),
                });

                const result = await response.json();

                if (result.success) {
                    // عرض البيانات المسترجعة في النافذة المنبثقة
                    document.getElementById('generatedContent').textContent = result.data.candidates[0].content.parts[0].text;
                    document.getElementById('popup').classList.remove('hidden');
                } else {
                    alert('Failed to generate content: ' + result.message);
                }
            } catch (error) {
                console.error(error);
                alert('An error occurred while generating content.');
            }
        });

        // زر Accept
        document.getElementById('acceptButton').addEventListener('click', function () {
            // وضع النص في حقل الوصف
            const generatedText = document.getElementById('generatedContent').textContent;
            document.getElementById('description').value = generatedText;

            // إخفاء النافذة المنبثقة
            document.getElementById('popup').classList.add('hidden');
        });

        // زر Cancel
        document.getElementById('cancelButton').addEventListener('click', function () {
            document.getElementById('popup').classList.add('hidden');
        });
    </script>
</x-app-layout>
