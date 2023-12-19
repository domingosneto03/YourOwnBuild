@extends('layouts.home')

@section('content')
<script type="text/javascript" src={{ url('js/admin.js') }} defer></script>

<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('admin.showUsers') }}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Users
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.showProjects') }}" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Projects
      </a>
    </li>
  </ul>
  <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
  <div class="container w-50">
    <div class="row my-3">
      <input class="form-control me-2 mw-30" type="search" onkeyup="searchProject(this);" placeholder="Search project" aria-label="Search">
    </div>
    <div class="row">
      <div id="projectCards" class="col">
        @foreach ($projects as $project)
          <div class="card row mt-1">
            <div class="card-body">
              <h5 class="card-title">{{ $project->name }}</h5>
              @if ($project->is_public)
                <h6 class="card-subtitle mb-2 text-muted">Public project</h6>
              @else
                <h6 class="card-subtitle mb-2 text-muted">Private project</h6>
              @endif
              <p class="card-text">{{ $project->description }}</p>
              <div class="btn-group">
                <a href="/project/{{ $project->id }}" class="btn btn-outline-secondary btn-sm">Project</a>
                <button onclick="delProjectFunc(this);" class="btn btn-danger btn-sm">Delete</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection