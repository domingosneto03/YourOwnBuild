@extends('layouts.home') <!-- Assuming you have a layout file -->

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('homepage') }}">Homepage</a>
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a>
    <a href="#">Project Tasks</a>
    <a href="#">Settings</a>
</div>

<main class="main-content">
    <div class="task-details">
        <h2>{{ $task->name }}</h2>
        <p>Creator Name: {{ $task->creator->name }}</p>
        <p>Project: {{ $task->project->name }}</p>
        <p>Label: {{ $task->label }}</p>
        <p>Completion: {{ $task->completion }}</p>
        <p>Date Created: {{ $task->date_created->format('Y-m-d') }}</p>
        <p>Due Date: {{ $task->due_date->format('Y-m-d') }}</p>
        <p>Priority: {{ $task->priority }}</p>

        <!-- Add more details as needed -->

        <!-- Implement additional functionalities for the task page -->
    </div>
</main>
@endsection