@extends('layouts.home')

@section('content')
<main class="d-flex">
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
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
  </div>

  <!-- Projects List -->
  <section class="projects-list">
      @foreach ($projects as $project)
          <!-- Project Card Link -->
          <a href="/project/{{ $project->id }}" class="project-card-link"> <!-- Update href with the URL to the project page -->
              <div class="project-card">
                  <div class="card-header">
                      <h3>{{ $project->name }}</h3>
                      <p>Creator Name: {{ $project->creator->name }}</p>
                  </div>
                  <div class="card-body">
                      <p>{{ $project->description }}</p>
                  </div>
                  <div class="card-footer">
                      <span>{{ count($project->members) }} members</span>
                  </div>
              </div>
          </a>
      @endforeach
  </section>
</main>
@endsection
