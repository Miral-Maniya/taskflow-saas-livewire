<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display task listing.
     */
    public function index()
    {
        return response()->json([

            'success' => true,

            'data' => Task::latest()->paginate(10)

        ]);
    }

    /**
     * Store new task.
     */
    public function store(
        Request $request,
        TaskService $taskService
    ) {

        $validated = $request->validate([

            'title' => 'required|min:3',

            'client_id' => 'required',

            'priority' => 'required',

            'status' => 'required',
        ]);

        $validated['user_id'] = auth()->id();

        $task = $taskService
            ->createTask($validated);

        return response()->json([

            'success' => true,

            'message' => 'Task created successfully.',

            'data' => $task

        ], 201);
    }

    /**
     * Show single task.
     */
    public function show(Task $task)
    {
        return response()->json([

            'success' => true,

            'data' => $task

        ]);
    }

    /**
     * Update task.
     */
    public function update(
        Request $request,
        Task $task
    ) {

        $validated = $request->validate([

            'title' => 'required|min:3',

            'priority' => 'required',

            'status' => 'required',
        ]);

        $task->update($validated);

        return response()->json([

            'success' => true,

            'message' => 'Task updated successfully.',

            'data' => $task

        ]);
    }

    /**
     * Delete task.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([

            'success' => true,

            'message' => 'Task deleted successfully.'

        ]);
    }
}