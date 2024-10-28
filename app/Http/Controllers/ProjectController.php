<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{  public function index()
    {
        $projects = auth()->guard('admin')->user()->projects;
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        Project::create([
            'name' => $request->name,
            'admin_id' => auth()->guard('admin')->id(),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    // public function show(Project $project)
    // {
    //     return view('admin.project.show', compact('project'));
    // }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'name' => $request->name,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }





    public function destroy(Project $project)
    {
        Log::info('Attempting to delete project with ID: ' . $project->id);
        $project->delete();
        Log::info('Project deleted successfully!');

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }



}
