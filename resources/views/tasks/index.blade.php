<x-app-layout>
    <style>

        .table-wrapper {
            display: block;
        }

        .card-wrapper {
            display: none;
        }

        .table-view .table-wrapper {
            display: block;
        }

        .table-view .card-wrapper {
            display: none;
        }

        .card-view .table-wrapper {
            display: none;
        }

        .card-view .card-wrapper {
            display: grid;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📋 {{ __('Your Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
                        <div class="flex flex-wrap gap-4">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Search by title 🔍"
                                   class="flex-grow px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto">

                            <select name="status"
                                    class="px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-auto">
                                <option value="">📋 Select Status</option>
                                <option value="todo" {{ request('status') == 'todo' ? 'selected' : '' }}>To Do</option>
                                <option value="doing" {{ request('status') == 'doing' ? 'selected' : '' }}>Doing</option>
                                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                            </select>

                            <select name="priority"
                                    class="px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-auto">
                                <option value="">⚖️ Select Priority</option>
                                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                            </select>

                            <select name="sort_by"
                                    class="px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-auto">
                                    <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>
                                        ⚡ Priority
                                    </option>
                                    <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>
                                        🛠️ Status
                                    </option>
                                    <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>
                                        📅 Due Date
                                    </option>

                            </select>

                            <select name="direction"
                                    class="px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-auto">
                                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>
                                        ⬆️ Asc
                                    </option>
                                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>
                                        ⬇️ Desc
                                    </option>

                            </select>

                            <select name="per_page"
                                    class="px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-auto">
                                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>
                                        📄 10
                                    </option>
                                    <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>
                                        📄 25
                                    </option>
                                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>
                                        📄 50
                                    </option>

                            </select>

                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">
                                    🔍 Filter
                            </button>
                        </div>
                    </form>

                    <!-- Toggle Button -->
                    <div class="flex justify-end mb-4">
                        <button id="toggle-view"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                📇 Switch to Card View
                        </button>
                    </div>
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('tasks.create') }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                ✏️ Create
                        </a>
                    </div>

                    <!-- Tasks Container -->
                    <div id="tasks-container" class="table-view">
                        <!-- Table View -->
                        <div class="table-wrapper overflow-x-auto">
                            <table class="w-full border-collapse min-w-[600px]">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">📝 Title</th>
                                        <th class="border px-4 py-2">📄 Description</th>
                                        <th class="border px-4 py-2">📅 Due Date</th>
                                        <th class="border px-4 py-2">🔴 Priority</th>
                                        <th class="border px-4 py-2">🔄 Status</th>
                                        <th class="border px-4 py-2">⚙️ Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $task->title }}</td>
                                            <td class="border px-4 py-2">{{ $task->description }}</td>
                                            <td class="border px-4 py-2">{{ $task->due_date }}</td>
                                            <td class="border px-4 py-2">{{ ucfirst($task->priority->value) }}</td>
                                            <td class="border px-4 py-2">{{ ucfirst($task->status->value) }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('tasks.edit', $task) }}"
                                                    class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                            🗑️ Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Card View -->
                        <div class="card-wrapper hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($tasks as $task)
                                <div class="bg-white dark:bg-gray-800 border rounded-lg shadow-md p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $task->title }}</h3>
                                    <p class="text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Due: {{ $task->due_date }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Priority: {{ ucfirst($task->priority->value) }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Status: {{ ucfirst($task->status->value) }}</p>
                                    <div class="flex gap-2 mt-4">
                                        <a href="{{ route('tasks.edit', $task) }}"
                                            class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                    🗑️ Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('toggle-view');
            const tasksContainer = document.getElementById('tasks-container');

            const savedView = localStorage.getItem('tasksView') || (window.innerWidth < 768 ? 'card-view' : 'table-view');
            tasksContainer.classList.add(savedView);
            toggleButton.textContent = savedView === 'table-view' ? '📇 Switch to Card View' : '📇 Switch to Table View';

            toggleButton.addEventListener('click', () => {
                if (tasksContainer.classList.contains('table-view')) {
                    tasksContainer.classList.remove('table-view');
                    tasksContainer.classList.add('card-view');
                    toggleButton.textContent = '📇 Switch to Table View';
                    localStorage.setItem('tasksView', 'card-view');
                } else {
                    tasksContainer.classList.remove('card-view');
                    tasksContainer.classList.add('table-view');
                    toggleButton.textContent = '📇 Switch to Card View';
                    localStorage.setItem('tasksView', 'table-view');
                }
            });
        });
    </script>

</x-app-layout>
