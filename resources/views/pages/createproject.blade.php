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
    <h1>Create Project</h1>

    <form method="post" action="{{ route('projects.store') }}" class="create-form">
        @csrf

        <label for="name" class="simple">Project Name:</label>
        <input class="input" type="text" name="name" id="name" required>

        <label for="description" class="large-text">Description:</label>
        <textarea class = "textarea" name="description" id="description"></textarea>

        <label for="is_public" class='options'>Privacy:</label>
        <select class='selection' name="is_public" id="is_public">
            <option value="0">Private</option>
            <option value="1">Public</option>
        </select>

        <button class="button" type="submit">Create</button>
    </form>
</main>
@endsection
