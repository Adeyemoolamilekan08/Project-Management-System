@extends('layouts.app')

@section('dashboard')
<div class="container">
    <h2>Projects</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a><br><br> <br>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    {{-- <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a> --}}
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>

</style>
@endsection
