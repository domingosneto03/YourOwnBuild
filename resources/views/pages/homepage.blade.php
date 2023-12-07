@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Home
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('projects.create') }}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Create Project
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

<!-- Projects List -->
<div class="album py-5 bg-body-tertiary flex-grow-1">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach ($projects as $project)
        <div class="col">
          <div id="id-project-{{ $project->id }}" class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ $project->name }}</h1>
              <p class="card-text">{{ $project->description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="../project/{{ $project->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                  <a href="../project/{{ $project->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                @php
                  $tasksCount = $project->tasks->count();

                  if ($tasksCount > 0) {
                      $closestTask = $project->closestDeadlineTask()->first();
                      $closestDeadline = $closestTask->due_date;
                      $now = new DateTime();
                      $daysLeft = $now->diff($closestDeadline)->format("%d");
                  }
                @endphp
                @if ($daysLeft == 0)
                  <small class="text-body-secondary">Next deadline today</small>
                @elseif ($daysLeft == 1)
                  <small class="text-body-secondary">Next deadline tomorrow</small>
                @else 
                  <small class="text-body-secondary">Next deadline in {{ $daysLeft }} days</small>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
