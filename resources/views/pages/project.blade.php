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
    <li>
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Team
      </a>
    </li>
    <li>
      <a href="{{ route('projects.edit', $project->id) }}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Edit Project
      </a>
    </li>
    <li>
      <a href="{{ route('tasks.create', $project->id) }}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        New Task
      </a>
    </li>
    <li>
      <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();" class="nav-link active --bs-danger">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Delete Project
      </a>
    </li>
  </ul>
  <hr>
</div>

<!-- Sidebar -->
<!--
<div class="sidebar">
    <a href="{{ route('homepage') }}">Homepage</a>
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="{{ route('projects.edit', $project->id) }}">Edit Project</a>
    <a href="{{ route('tasks.create', $project->id) }}">New Task</a>
    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();">Delete Project</a>
    <a href="#">Settings</a>
</div>
-->

<!-- Tasks List -->
<main class="main-content">
    <section class="tasks-list">
        @php 
            $tasks = $project->tasks()->get();
            $pendingTasks = $tasks->where('completion', 'pending');
            $inProgressTasks = $tasks->where('completion', 'in_progress');
            $completedTasks = $tasks->where('completion', 'completed');
        @endphp
        <form method="post" action="{{ route('projects.destroy', $project->id) }}" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
        <div class="task-category">
            <h2>Pending</h2>
            @foreach ($pendingTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
        <div class="task-category">
            <h2>In Progress</h2>
            @foreach ($inProgressTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
        <div class="task-category">
            <h2>Completed</h2>
            @foreach ($completedTasks as $task)
                @include('partials.task', ['task' => $task])
            @endforeach
        </div>
    </section>
</main>
@endsection