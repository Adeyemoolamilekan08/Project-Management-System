@extends('layouts.app')

@section('dashboard')
    <div class="form-container">
        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
