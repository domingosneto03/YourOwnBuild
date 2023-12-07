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

<!-- Edit Project Form -->
<div class="container">
    <h2>Edit Project</h2>
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
@endsection
