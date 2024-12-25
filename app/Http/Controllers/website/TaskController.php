<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض قائمة المهام
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // عرض نموذج إضافة مهمة جديدة
    public function create()
    {
        $users = User::all(); // لجلب جميع المستخدمين لاختيار المستخدم
        return view('tasks.create', compact('users'));
    }

    // تخزين مهمة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id', // التأكد من وجود المستخدم
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id, // ربط المهمة بالمستخدم
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    // عرض نموذج تحرير مهمة
    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    // تحديث مهمة موجودة
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    // حذف مهمة
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
