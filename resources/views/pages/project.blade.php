@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('homepage') }}">Homepage</a>
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="{{ route('projects.edit', $project->id) }}">Edit Project</a>
    <a href="{{ route('tasks.create', $project->id) }}">New Task</a>
    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();">Delete Project</a>
    <a href="#">Settings</a>
</div>

<!-- Tasks List -->
<main class="main-content">
    <section class="tasks-list">
        @php 
            $tasks = $project->tasks()->get();
            $pendingTasks = $tasks->where('completion', 'pending');
            $inProgressTasks = $tasks->where('completion', 'in_progress');
            $completedTasks = $tasks->where('completion', 'completed');
        @endphp
        <form method="post" action="{{ route('projects.destroy', $project->id) }}" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
        <div class="task-category">
            <h2>Pending</h2>
            @foreach ($pendingTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
        <div class="task-category">
            <h2>In Progress</h2>
            @foreach ($inProgressTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
        <div class="task-category">
            <h2>Completed</h2>
            @foreach ($completedTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
    </section>
</main>
@endsection