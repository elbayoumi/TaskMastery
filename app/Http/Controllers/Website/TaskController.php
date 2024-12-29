<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use OpenAI;
use Orhanerday\OpenAi\OpenAi;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        // Default pagination per page
        $perPage = $request->has('per_page') ? (int) $request->per_page : 10;

        // Initialize the query builder for tasks
        $tasksQuery = $user->tasks()->getQuery();

        // Apply filtering for search by title
        if ($request->has('search') && $request->search) {
            $tasksQuery->where('title', 'like', '%' . $request->search . '%');
        }

        // Apply filtering for status (To Do, Doing, Done)
        if ($request->has('status') && $request->status) {
            $tasksQuery->where('status', $request->status);
        }

        // Apply filtering for priority (Low, Medium, High)
        if ($request->has('priority') && $request->priority) {
            $tasksQuery->where('priority', $request->priority);
        }

        // Apply sorting by status or priority
        if ($request->has('sort_by') && in_array($request->sort_by, ['priority', 'status', 'due_date'])) {
            $tasksQuery->orderBy($request->sort_by, $request->direction ?? 'asc');
        }

        // Paginate the tasks
        $tasks = $tasksQuery->paginate($perPage);

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }


    // In your controller



    public function store(StoreTaskRequest $request)
    {
        $user = Auth::user();

        // Validation is automatically done by StoreTaskRequest

        // Variable to store the suggested due date
        $dueDateSuggestion = null;

        // If a description is provided, request a due date suggestion from OpenAI
        if ($request->description) {
            try {
                $openAi = new OpenAi(env('OPENAI_API_KEY'));

                // Send a request to OpenAI for a due date suggestion based on the task description
                $response = $openAi->completion([
                    'model' => 'gpt-3.5-turbo',
                    'prompt' => "Suggest a due date for this task: {$request->description}",
                    'max_tokens' => 50,
                ]);

                // Extract the suggested due date from the response
                $dueDateSuggestion = $response['choices'][0]['text'] ?? null;
            } catch (\Exception $e) {
                // If there's an error with OpenAI, keep the suggestion as null
                $dueDateSuggestion = null;
            }
        }

        // Use the provided due date or the suggested due date
        $dueDate = $request->due_date ?? $dueDateSuggestion;

        // Create the new task with the validated data
         $user->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $dueDate,
            'priority' => $request->priority,
            'status' => $request->status, // Save the status of the task
        ]);



        // Redirect to the task index with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully with suggested due date!');
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {


        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:todo,doing,done',
        ]);

        $task->update(['status' => $request->status]);
        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
    }
}
