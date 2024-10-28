@extends('layouts.app')

@section('dashboard')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $project->name }}</h1>
            <p>{{ $project->description }}</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <h2>Tasks</h2>
            <form action="{{ route('tasks.store', $project) }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="Task Title" required class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="description" placeholder="Task Description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <select name="priority" class="form-control">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>

            @foreach ($project->tasks as $task)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text">Priority: {{ ucfirst($task->priority) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Container for the entire section */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Headings */
h1, h2 {
    color: #333;
    text-align: center;
    font-family: Arial, sans-serif;
    margin-bottom: 20px;
}

/* Task Form Styling */
form {
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

form input[type="text"],
form textarea,
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    font-family: Arial, sans-serif;
}

form textarea {
    resize: vertical; /* Allows vertical resizing */
    min-height: 120px;
}

form select {
    background-color: #fff;
}

form button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    font-family: Arial, sans-serif;
}

form button:hover {
    background-color: #0056b3;
}

/* Task List Styling */
.task-list {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.task-list p {
    font-size: 18px;
    color: #333;
    padding: 10px;
    border-bottom: 1px solid #eee;
    margin: 0;
}

/* Priority Color Coding */
.task-list p.low {
    border-left: 5px solid #28a745;
}

.task-list p.medium {
    border-left: 5px solid #ffc107;
}

.task-list p.high {
    border-left: 5px solid #dc3545;
}

</style>

@endsection
