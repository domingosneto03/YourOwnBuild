@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('homepage.projects') }}" id="discover-btn" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                Homepage
            </a>
        </li>
        <li>
            <a href="{{ route('homepage.discover') }}" id="discover-btn" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                Discover
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('homepage.newproject') }}" id="homepage-btn" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                New Project
            </a>
        </li>
    </ul>
    <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <!-- Create Project Form -->
    <div class="container">
        <h2>Create Project</h2>
        <form method="post" action="{{ route('projects.store') }}">
            @csrf
            <div class="mb-3 col-8">
                <label for="name" class="form-label">Project Name:</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="mb-3 col-8">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="mb-3 col-8">
                <select class="form-select" aria-label="Privacy" name="is_public">
                    <option value="0">Private</option>
                    <option value="1">Public</option>
                </select>
            </div>
            <div class="col-1">
                <button class="btn btn-primary btn-sm" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
