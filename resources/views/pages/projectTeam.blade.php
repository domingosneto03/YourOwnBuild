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
        </li>
        <li>
            <a href="{{ route('projects.team', ['id' => $project->id]) }}" id="project-tasks-btn" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                Team
            </a>
        </li>
        @can('edit', $project)
        <li class="nav-item">
            <a href="{{ route('projects.edit', ['id' => $project->id]) }}" id="edit-project-btn" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                Edit Project
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('projects.newtask', ['id' => $project->id]) }}" id="new-task-btn" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                New Task
            </a>
        </li>
        @can('delete', $project)
        <li class="nav-item mt-2">
            <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();" class="nav-link bg-danger text-light">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                Delete Project
            </a>
        </li>
        @endcan
    </ul>
    <hr>
</div>

<form method="post" action="{{ route('projects.destroy', $project->id) }}" id="delete-form">
    @csrf
    @method('DELETE')
</form>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a href="{{ route('projects.team', ['id' => $project->id]) }}" class="nav-link active" aria-selected="true">My Team</a>
                <a href="{{ route('projects.requests', ['id' => $project->id]) }}" class="nav-link"   aria-selected="false">Requests</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!-- Team Tab -->
            <div class="tab-pane fade show active" id="nav-team" role="tabpanel" aria-labelledby="nav-team-tab">
                @can('invite', $project)
                <div class="mt-3 col-4">
                    <h5>Invite an user to your team</h5>
                    <form class="d-flex" method="post" action="{{ route('project.invite', ['id_project' => $project->id]) }}">
                        @csrf
                        @method('POST')
                        <input class="form-control" type="text" name="fullName" id="fullName" placeholder="Full Name" required autocomplete="off" data-autocomplete-url="{{ route('autocomplete.users') }}">
                        <button type="submit" class="btn btn-outline-success btn-sm ms-2">Invite</button>
                    </form>
                    <ul class="list-group" id="fullNameList"></ul>
                </div>
                @endcan
                <div class="row mt-4">
                    <h5>My Team</h5>
                    @foreach($teamMembers as $member)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-0">{{ $member->name }}</h5>
                                    @if($member->pivot->role === 'project_member')
                                        <p class="card-text mb-2">Project Member</p>
                                    @elseif($member->pivot->role === 'coordinator')
                                        <p class="card-text mb-2">Coordinator</p>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ $member->id == auth()->id() ? route('profile.page', $member->id) : '#' }}" class="btn btn-outline-secondary btn-sm">Visit Profile</a>
                                        @can('remove', $project)
                                        <a href="#" class="btn btn-outline-danger btn-sm ms-2">Remove</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Pagination links -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $teamMembers->links() }}
        </div>
    </div>
</div>
@endsection
