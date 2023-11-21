@extends('layouts.home')

@section('content')
    <h1>Create Project</h1>

    <form method="post" action="{{ route('projects.store') }}">
        @csrf

        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="is_public">Privacy:</label>
        <select name="is_public" id="is_public">
            <option value="0">Private</option>
            <option value="1">Public</option>
        </select>

        <button type="submit">Create</button>
    </form>
@endsection
