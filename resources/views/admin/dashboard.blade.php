@extends('layouts.app')

@section('dashboard')

@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<main class="main-content">
    <h2>Welcome to Your Dashboard</h2>
    <p>Here you can manage your projects, tasks, and more.</p>
    <!-- Main content goes here -->
</main>

@endsection
