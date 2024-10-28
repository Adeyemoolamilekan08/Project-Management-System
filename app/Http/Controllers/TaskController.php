<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{

    use AuthorizesRequests;


    public function index()
{
    // Only get tasks from projects owned by the authenticated admin
    $tasks = Task::whereHas('project', function($query) {
        $query->where('admin_id', auth('admin')->id());
    })->with('project')->get();

    return view('admin.tasks.index', compact('tasks'));
}

    public function create()
    {
        // Only get projects owned by the authenticated admin
        $projects = Project::where('admin_id', auth('admin')->id())->get();
        return view('admin.tasks.create', compact('projects'));
    }


    public function store(Request $request)
    {
        // Get the project from the request's project_id
        $project = Project::findOrFail($request->project_id);

        // Check if the logged-in admin owns this project
        if ($project->admin_id !== auth('admin')->id()) {
            abort(403, 'You do not own this project');
        }

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'project_id' => $project->id,  // Use the project's id we just fetched
            'admin_id' => auth('admin')->id()
        ]);

        return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully.');
    }



    public function edit(Task $task)
{
    $projects = Project::where('admin_id', auth('admin')->id())->get();
    return view('admin.tasks.edit', compact('task', 'projects'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required',
        'project_id' => 'required|exists:projects,id',
        'priority' => 'required|in:low,medium,high',
        'description' => 'nullable'
    ]);

    if ($task->project->admin_id !== auth('admin')->id()) {
        return back()->with('error', 'You are not authorized to edit this task.');
    }

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'project_id' => $request->project_id
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task updated successfully.');
}

public function destroy(Task $task)
{
    if ($task->project->admin_id !== auth('admin')->id()) {
        return back()->with('error', 'You are not authorized to delete this task.');
    }

    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully.');
}


}
