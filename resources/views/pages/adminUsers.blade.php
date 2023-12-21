@extends('layouts.home')

@section('content')
<script type="text/javascript" src={{ url('js/admin.js') }} defer></script>

<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('admin.showUsers') }}" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Users
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.showProjects') }}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Projects
      </a>
    </li>
  </ul>
  <hr>
</div>

<!-- Main content -->
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1">
    <div class="container w-50">
      <div class="row my-3">
        <input class="form-control me-2 mw-30" type="search" onkeyup="searchUser(this);" placeholder="Search user" aria-label="Search">
      </div>
      <div class="row">
        <div id="userCards" class="col">
            @foreach ($users as $user)
                <div class="card row mt-1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->username }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->name }}</h6>
                        <div class="btn-group">
                            <a href="{{ route('admin.showProfile', ['id' => $user->id]) }}" class="btn btn-outline-secondary btn-sm">Profile</a>
                            @if ($user->is_blocked)
                                <button onclick="unblockUserFunc(this);" class="btn btn-danger btn-sm">Unblock</button>
                            @else
                                <button onclick="blockUserFunc(this);" class="btn btn-danger btn-sm">Block</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination links -->
        <div class="mt-3 d-flex justify-content-center">
          {{ $users->links() }}
        </div>
    </div>
</div>
@endsection