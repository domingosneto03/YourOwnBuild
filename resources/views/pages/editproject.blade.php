@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <a href="#">Homepage</a>
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="#">Project Tasks</a>
    <a href="#">Settings</a>
</div>
<main class="main-content">
    <h1>Edit Project</h1>

    <form method="post" action="{{ route('projects.update', $project->id) }}" class="create-form">
        @csrf
        @method('PUT')

        <label for="name" class="label-name">Project Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}" required class="input">

        <label for="description">Description:</label>
        <textarea class = "textarea" name="description" id="description">{{ $project->description }}</textarea>

        <label for="is_public" class='label-public'>Privacy:</label>
        <select class='selection' name="is_public" id="is_public">
            <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
            <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
        </select>

        <button class="button" type="submit">Update</button>
    </form>
</main>
@endsection
