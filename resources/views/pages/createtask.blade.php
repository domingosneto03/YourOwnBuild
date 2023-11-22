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
    <h1>Create Task</h1>

    <form method="post" action="{{ route('tasks.store') }}" class="create-form">
        @csrf
        <input type="hidden" name="id_project" value="{{ $project->id }}">
        <label for="name" class="label-name">Task Name:</label>
        <input class="input" type="text" name="name" id="name" required>

        <label for="label" class="label-name">Task Label:</label>
        <input class="input" type="text" name="label" id="label" required>
        
        <label for="completion" class='label-public'>Status:</label>
        <select class='selection' name="completion" id="completion">
            <option value="pending">Pending</option>
        </select>

        <label for="dateInput" class="label-name">Select a Date:</label>
        <input type="date" id="dateInput" name="due_date" required>

        <label for="priority" class='label-public'>Priority:</label>
        <select class='selection' name="priority" id="is_public">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <button class="button" type="submit">Create</button>
    </form>
</main>
@endsection
