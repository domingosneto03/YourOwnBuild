@extends('layouts.home') <!-- Assuming you have a layout file -->

@section('content')
    <h1>Create Project</h1>

    <form method="post" action="{{ route('projects.store') }}">
        @csrf <!-- CSRF token for security -->

        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="is_public">Public:</label>
        <input type="checkbox" name="is_public" id="is_public" value="1">

        <button type="submit">Create</button>
    </form>
@endsection
