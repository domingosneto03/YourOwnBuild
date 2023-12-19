@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('projects.tasks', ['id' => $project->id]) }}" id="project-team-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Tasks
      </a>
    </li class="nav-item">
    <li>
      <a href="{{ route('projects.team', ['id' => $project->id]) }}" id="project-team-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Team
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('projects.edit', ['id' => $project->id]) }}" id="project-tasks-btn" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Edit Project
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('projects.newtask', ['id' => $project->id]) }}" id="new-task-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        New Task
      </a>
    </li>
    <li class="nav-item mt-2">
      <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();" class="nav-link bg-danger text-light">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Delete Project
      </a>
    </li>
  </ul>
  <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1 justify-content-center">
    <!-- Edit Project Form -->
    <div class="container w-70 py-5">
        <h3 class="mb-4">Edit Project</h3>
        <form method="post" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3 col-8">
                <label for="name" class="form-label">Project Name:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $project->name }}" required>
            </div>
            <div class="mb-3 col-8">
                <label for="description" class="form-label">Description:</label>
                <textarea class = "form-control" name="description" id="description">{{ $project->description }}</textarea>
            </div>
            <div class="mb-3 col-8">
                <select class="form-select" aria-label="Privacy" name = "is_public">
                <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
                <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
                </select>
            </div>
            <div class="col-1">
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection