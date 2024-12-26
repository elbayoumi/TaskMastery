<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->orderBy('due_date')
                     ->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:high,medium,low',
        ]);

        // استخدم API للحصول على اقتراح الموعد النهائي
        $dueDateSuggestion = null;

        if ($request->description) {
            $response = app(\OpenAI\Client::class)->completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => "Suggest a due date for this task: {$request->description}",
                'max_tokens' => 50,
            ]);

            $dueDateSuggestion = $response['choices'][0]['text'] ?? null;
        }

        // إذا لم يقم المستخدم بإدخال تاريخ، يتم استخدام الاقتراح
        $dueDate = $request->due_date ?? $dueDateSuggestion;

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $dueDate,
            'priority' => $request->priority,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully with suggested due date!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:high,medium,low',
        ]);

        $task->update($request->all());
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
