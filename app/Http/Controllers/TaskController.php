<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use SplQueue;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in(['common_ops', 'invoice_ops', 'custom_ops'])],
            'amount' => 'nullable|integer',
            'currency' => 'nullable|string|in:₺,€,$,£',
            'country' => 'nullable|string|max:2',
        ]);

        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    public function addPrerequisites(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        $prerequisiteIds = $request->input('prerequisites');
        $task->prerequisites()->attach($prerequisiteIds);

        return response()->json('Prerequisites added successfully', 200);
    }

    public function getAllTasks()
    {
        $tasks = Task::all();

        return response()->json($tasks, 200);
    }

    public function orderTasks()
    {
        $tasks = Task::all();
        $sortedTasks = [];

        $indegree = [];
        foreach ($tasks as $task) {
            $indegree[$task->id] = $task->prerequisites->count();
        }

        $queue = new SplQueue();

        foreach ($indegree as $taskId => $degree) {
            if ($degree === 0) {
                $queue->enqueue($taskId);
            }
        }

        while (!$queue->isEmpty()) {
            $taskId = $queue->dequeue();
            $task = Task::find($taskId);

            $sortedTasks[] = $task;

            $dependents = $task->dependents;
            foreach ($dependents as $dependent) {
                $indegree[$dependent->id]--;
                if ($indegree[$dependent->id] === 0) {
                    $queue->enqueue($dependent->id);
                }
            }
        }

        return response()->json($sortedTasks, 200);
    }


}
