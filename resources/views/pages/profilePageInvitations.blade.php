@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('profile.page', ['id' => $user->id]) }}" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                Profile
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                Edit Profile
            </a>
        </li>
        <li>
            <a href="{{ route('profile.invitations', ['id' => $user->id]) }}" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                Invitations
            </a>
        </li>
        <li class="nav-item mt-2">
            <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this project?')) document.getElementById('delete-form').submit();" class="nav-link bg-danger text-light">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                Delete Account
            </a>
        </li>
    </ul>
    <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <div class="album py-1 bg-body-tertiary flex-grow-1">
        <div class="container">
            <h3 class="mb-4">Project Invitations</h3>
            @if ($user->invited->isEmpty())
                <div class="alert alert-info" role="alert">
                    No project invitations at the moment.
                </div>
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($invitedProjects as $project)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->name }}</h1>
                                    <p class="card-text">{{ $project->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <form action="{{ route('invite.accept', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-outline-success btn-sm">Accept</button>
                                            </form>
                                            <form action="{{ route('invite.refuse', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-outline-danger btn-sm ms-2">Refuse</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- Pagination links -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $invitedProjects->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
