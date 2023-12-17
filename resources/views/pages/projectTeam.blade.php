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
    </li class="nav-item">
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

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <!-- team.blade.php -->
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-team-tab" data-bs-toggle="tab" data-bs-target="#nav-team" type="button" role="tab" aria-controls="nav-team" aria-selected="true">My Team</button>
                <button class="nav-link" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">Requests</button>
                <button class="nav-link" id="nav-add-user-tab" data-bs-toggle="tab" data-bs-target="#nav-add-user" type="button" role="tab" aria-controls="nav-add-user" aria-selected="false">Add User</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-team" role="tabpanel" aria-labelledby="nav-team-tab" tabindex="0">
                <div class="row mt-4">
                    @foreach($project->members as $member)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-0">{{ $member->name }}</h5>
                                    @if($member->pivot->role === 'project_member')
                                        <p class="card-text mb-2">Project Member</p>
                                    @elseif($member->pivot->role === 'coordinator')
                                        <p class="card-text mb-2">Coordinator</p>
                                    @endif

                                    @if($member->id == auth()->id())
                                        <a href="{{ route('profile.page', $member->id) }}" class="btn btn-outline-secondary btn-sm">Visit Profile</a>
                                    @else
                                        <a href="#" class="btn btn-outline-secondary btn-sm">Visit Profile</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
                @if ($project->joinRequests->isEmpty())
                    <div class="alert alert-info mt-4" role="alert">
                        No requests to join the project at the moment.
                    </div>
                @else
                    <div class="row mt-4">
                        @foreach($project->joinRequests as $request)
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
            </div>
            <div class="tab-pane fade" id="nav-add-user" role="tabpanel" aria-labelledby="nav-add-user-tab" tabindex="0">
                <h5 class="mt-3">Suggestions</h5>
                <div class="row mt-4">
                    @php
                        $nonMembers = $users->reject(function ($user) use ($project) {
                            return $project->members->contains('id', $user->id);
                        })->shuffle()->take(12);
                    @endphp
                    @foreach($nonMembers as $user)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                                        @if($project->invited->contains('id', $user->id))
                                            <button class="btn btn-outline-secondary btn-sm" disabled>Invited</button>
                                        @else
                                            <form action="{{ route('project.invite', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-outline-success btn-sm">Invite</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection