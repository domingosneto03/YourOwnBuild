@extends('layouts.home')

@section('content')
<script type="text/javascript" src={{ url('js/projectSidebar.js') }} defer></script>

<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" id="project-tasks-btn" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Tasks
      </a>
    </li class="nav-item">
    <li>
      <a href="#" id="project-team-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Team
      </a>
    </li>
    <li class="nav-item">
      <a href="#" id="edit-project-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Edit Project
      </a>
    </li>
    <li class="nav-item">
      <a href="#" id="new-task-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        New Task
      </a>
    </li>
    <li class="nav-item">
      <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();" class="nav-link bg-danger text-light">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Delete Project
      </a>
    </li>
  </ul>
  <hr>
</div>

<form method="post" action="{{ route('projects.destroy', $project->id) }}" id="delete-form">
            @csrf
            @method('DELETE')
</form>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
  @include('partials.projectTasks')
</div>

@endsection