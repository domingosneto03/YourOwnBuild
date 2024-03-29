@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('homepage.projects') }}" id="new-project-btn" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                My Projects
            </a>
        </li>
        <li>
            <a href="{{ route('homepage.discover') }}" id="homepage-btn" class="nav-link active" aria-current="page">
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
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <div class="album py-5 bg-body-tertiary flex-grow-1">
        <div class="container">
            <h3 class="mb-4">Discover New Projects</h3>
            <div class="row my-3">
                <form class="d-flex form-inline my-2 my-lg-0" action="{{ route('homepage.discover') }}" method="get">
                    @if (request()->has('query'))
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request()->input('query') }}">
                    @else
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    @endif
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            @if (count($projects) == 0)
                <p class="fs-3 fw-bold">There are no projects with that name</p>
            @else
            <div id="projectCards" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($projects as $project)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h1>
                                <p class="card-text">{{ $project->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if ($project->joinRequests->contains('id', $user->id))
                                        <button class="btn btn-outline-secondary btn-sm" disabled>Requested</button>
                                    @else
                                        <form action="{{ route('project.request', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-outline-success btn-sm">Request to Join</button>
                                        </form>
                                    @endif   
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        <!-- Pagination links -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
