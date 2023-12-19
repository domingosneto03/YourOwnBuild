@extends('layouts.home')

@section('content')
<div class="d-flex flex-row">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('projects.tasks', ['id' => $project->id]) }}" id="edit-project-btn" class="nav-link link-body-emphasis">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Tasks
                </a>
            </li>
            <li>
                <a href="{{ route('projects.team', ['id' => $project->id]) }}" id="project-tasks-btn" class="nav-link active" aria-current="page">
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
                <a href="{{ route('projects.newtask', ['id' => $project->id]) }}" id="new-task-btn" class="nav-link link-body-emphasis">
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
    <div class="flex-grow-1">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a href="{{ route('projects.team', ['id' => $project->id]) }}" class="nav-link" aria-selected="false">My Team</a>
                    <a href="{{ route('projects.requests', ['id' => $project->id]) }}" class="nav-link active" aria-selected="true">Requests</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- Requests Tab -->
                <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                    @if ($project->joinRequests->isEmpty())
                        <div class="alert alert-info mt-4" role="alert">
                            No requests to join the project at the moment.
                        </div>
                    @else
                        <div class="row mt-4">
                            @foreach($joinRequests as $request)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0">{{ $request->name }}</h5>
                                            <div class="d-flex">
                                                <form action="{{ route('requests.accept', ['id_user' => $request->id, 'id_project' => $project->id]) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-outline-success btn-sm">Accept</button>
                                                </form>
                                                <form action="{{ route('requests.refuse', ['id_user' => $request->id, 'id_project' => $project->id]) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ms-2">Refuse</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <!-- Pagination links -->
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $joinRequests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
