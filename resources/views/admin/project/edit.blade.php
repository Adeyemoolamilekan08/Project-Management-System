@extends('layouts.app')

@section('dashboard')
    <div class="form-container">
        <h1>Edit Project</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT or PATCH for updates -->

            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}" required>

            <button type="submit">Update Project</button>
        </form>
    </div>
@endsection
