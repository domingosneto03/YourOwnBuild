@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('homepage') }}" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Home
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Orders
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Products
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Customers
      </a>
    </li>
  </ul>
  <hr>
</div>
<main class="main-content">
    <h1>Edit Project</h1>

    <form method="post" action="{{ route('projects.update', $project->id) }}" class="edit-form">
        @csrf
        @method('PUT')

        <label for="name" class="simple">Project Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}" required class="input">

        <label for="description">Description:</label>
        <textarea class = "textarea" name="description" id="description">{{ $project->description }}</textarea>

        <label for="is_public" class='options'>Privacy:</label>
        <select class='selection' name="is_public" id="is_public">
            <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
            <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
        </select>

        <button class="button" type="submit">Update</button>
    </form>
</main>
@endsection
