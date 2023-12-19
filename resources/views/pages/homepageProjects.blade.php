@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('homepage.projects') }}" id="homepage-btn" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        My Projects
      </a>
    </li>
    <li>
      <a href="{{ route('homepage.discover') }}" id="discover-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Discover
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('homepage.newproject') }}" id="new-project-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        New Project
      </a>
    </li>
  </ul>
  <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex flex-column bg-body-tertiary flex-grow-1">
    <!-- Projects List -->
    <div class="album py-5 bg-body-tertiary flex-grow-1">
        <div class="container">
            <h3 class="mb-4">My Projects</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($projects as $project)
                @include('partials.projectCard')
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
