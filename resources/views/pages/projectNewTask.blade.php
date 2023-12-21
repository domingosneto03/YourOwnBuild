@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('projects.tasks', ['id' => $project->id]) }}" id="edit-project-btn" class="nav-link link-body-emphasis">
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
      <a href="{{ route('projects.edit', ['id' => $project->id]) }}" id="edit-project-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Edit Project
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('projects.newtask', ['id' => $project->id]) }}" id="project-tasks-btn" class="nav-link active" aria-current="page">
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

<form method="post" action="{{ route('projects.destroy', $project->id) }}" id="delete-form">
            @csrf
            @method('DELETE')
</form>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1 justify-content-center">
    <!-- Create Task Form -->
    <div class="container w-70 py-5">
        <h3 class="mb-4">Create Task</h3>
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf
            <input type="hidden" name="id_project" value="{{ $project->id }}">
            <input type="hidden" name="completion" value="pending">
            <div class="mb-3 col-8">
                <label for="name" class="form-label">Task Name:</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="mb-3 col-8">
                <label for="label" class="form-label">Task Label:</label>
                <textarea class = "form-control" name="label" id="description"></textarea>
            </div>
            <div class="mb-3 col-8">
                <label for="deadline" class="form-label">Deadline:</label>
                <input class="form-control" type="date" id="dateInput" name="due_date" required>
            </div>
            <div class="mb-3 col-8">
            <label for="priority" class="form-label">Priority:</label>
            <select class="form-select" aria-label="Priority" name = "priority" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            </div>
            <div class="mb-3 col-8">
                <label for="deadline" class="form-label">Assign to:</label>
                <div class="dropdown" id="assign-to-dropdown">
                    <button class="btn btn-outline-secondary form-select" type="button" id="assignToDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Users
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assignToDropdownButton" id="assigned-users-list" style="padding: 10px;">
                        @foreach ($project->members as $member)
                            <li><input class="form-check-input" type="checkbox" name="assigned[]" value="{{ $member->id }}"> {{ $member->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-1">
                <button class="btn btn-primary btn-sm" type="submit">Create</button>
            </div>
        </form>
    </div>
    <script>
        // Handle dropdown item selection
        $('#assigned-users-list input[type="checkbox"]').on('change', function () {
            var selectedUsers = $('#assigned-users-list input:checked').map(function () {
                return $(this).val();
            }).get();

            // Update the button text with selected users
            $('#assignToDropdownButton').text(selectedUsers.length > 0 ? 'Selected Users' : 'Select Users');
        });
    </script>
</div>

@endsection