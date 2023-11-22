<!-- resources/views/pages/edit.blade.php -->

@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('homepage') }}">Homepage</a>
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="#">Project Tasks</a>
    <a href="#">Settings</a>
</div>

<main class="main-content">
    <h1>Edit Task</h1>

    <form method="post" action="{{ route('tasks.update', ['id' => $task->id]) }}" class="edit-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_project" value="{{ $project->id }}">

        <label for="name" class="simple">Task Name:</label>
        <input class="input" type="text" name="name" id="name" value="{{ $task->name }}" required>

        <label for="label" class="simple">Task Label:</label>
        <input class="input" type="text" name="label" id="label" value="{{ $task->label }}" required>

        <label for="completion" class='options'>Status:</label>
        <select class='selection' name="completion" id="completion">
            <option value="pending" {{ $task->completion === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->completion === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->completion === 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <label for="dateInput" class="simple">Select a Date:</label>
        <input class="input" type="date" id="dateInput" name="due_date" value="{{ $task->due_date }}" required>

        <label for="priority" class='options'>Priority:</label>
        <select class='selection' name="priority" id="is_public">
            <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
        </select>

        <button class="button" type="submit">Update</button>
    </form>
</main>
@endsection
