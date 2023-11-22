@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <a href="#">My Projects</a>
    <a href="#">My Team</a>
    <a href="#">Project Tasks</a>
    <a href="#">Homepage</a>
    <a href="#">Labels</a>
    <a href="#">Settings</a>
    <a href="#">About Us</a>
    <a href="#">FAQ</a>
    <a href="#">Help</a>
</div>

<!-- Projects List -->
<main class="main-content">
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
