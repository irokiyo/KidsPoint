<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Child;
use App\Models\Category;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }
    public function select(Child $child)
    {
        $tasks = Task::all();
        return view('task.select', compact('tasks', 'child'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('task.register', compact('categories'));
    }
    public function store(TaskRequest $request)
    {
        Task::create([
            'title' => $request->name,
            'point' => $request->point,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('task.index')->with('success', '登録しました。');
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update([
            'title' => $request->name,
            'point' => $request->point,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('task.index')->with('success', '更新しました。');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', '削除しました。');
    }
}
