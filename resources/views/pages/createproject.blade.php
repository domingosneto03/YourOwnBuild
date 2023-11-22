@extends('layouts.home')

@section('content')
    <h1>Create Project</h1>

    <form method="post" action="{{ route('projects.store') }}" class="create-form">
        @csrf

        <label for="name" class="label-name">Project Name:</label>
        <input class="input" type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea class = "textarea" name="description" id="description"></textarea>

        <label for="is_public" class='label-public'>Privacy:</label>
        <select class='selection' name="is_public" id="is_public">
            <option value="0">Private</option>
            <option value="1">Public</option>
        </select>

        <button class="button" type="submit">Create</button>
    </form>
@endsection