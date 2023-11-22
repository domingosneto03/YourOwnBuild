@extends('layouts.home')

@section('content')
    <h1>Edit Project</h1>

    <form method="post" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $project->description }}</textarea>

        <label for="is_public">Privacy:</label>
        <select name="is_public" id="is_public">
            <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
            <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
