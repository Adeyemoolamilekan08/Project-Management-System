@extends('layouts.app')

@section('dashboard')

@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2>Create New Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="project_id">Project</label>
            <select class="form-control" id="project_id" name="project_id" required>
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>

<style>
    /* Paste the CSS code here */
    .dashboard-container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #333;
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 24px;
        margin: 0;
    }

    .btn-logout {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-logout:hover {
        background-color: #d32f2f;
    }

    .dashboard-content {
        display: flex;
        flex: 1;
    }

    .sidebar {
        background-color: #555;
        padding: 20px;
        width: 250px;
        color: white;
    }

    .sidebar nav ul {
        list-style: none;
    }

    .sidebar nav ul li {
        margin: 15px 0;
    }

    .sidebar nav ul li a {
        text-decoration: none;
        color: white;
        display: block;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .sidebar nav ul li a:hover {
        background-color: #666;
    }

    .sidebar nav ul li.dropdown {
        position: relative;
    }

    .sidebar nav ul li a {
        position: relative;
    }

    .sidebar nav ul li .dropdown-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        background-color: #666;
        border-radius: 4px;
        z-index: 1000;
        width: 180px;
    }

    .sidebar nav ul li.active .dropdown-menu {
        display: block;
    }

    .sidebar nav ul li .dropdown-menu li {
        padding: 10px;
        border-bottom: 1px solid #777;
    }

    .sidebar nav ul li .dropdown-menu li:last-child {
        border-bottom: none;
    }

    .sidebar nav ul li .dropdown-menu li a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .sidebar nav ul li .dropdown-menu li a:hover {
        background-color: #888;
    }

    .main-content {
        flex: 1;
        padding: 20px;
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 15px;
    }

    @media (max-width: 768px) {
        .dashboard-content {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
        }
    }
</style>

@endsection
