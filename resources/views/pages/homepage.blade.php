@extends('layouts.home')

@section('content')
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
@endsection
