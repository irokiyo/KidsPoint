<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskRecord;
use App\Models\Child;
use App\Models\Task;

class TaskRecordController extends Controller
{
    public function store(Request $request, Child $child)
    {
        $taskArray = $request->input('tasks', []);
        foreach ($taskArray as $taskId) {
            $task = Task::findOrFail($taskId);
    
            TaskRecord::create([
                'child_id' => $child->id,
                'task_id' => $task->id,
                'recorded_at' => now(),
                'comment' => $request->comment ?? '',
                'point' => $task->point,
            ]);
        }
        return redirect()->route('home')->with('success', '記録しました。');
    }
}
