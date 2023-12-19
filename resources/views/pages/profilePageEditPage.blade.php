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
            <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                Edit Profile
            </a>
        </li>
        <li>
            <a href="{{ route('profile.invitations', ['id' => $user->id]) }}" class="nav-link link-body-emphasis">
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
<div id="main-content" class="d-flex bg-body-tertiary flex-grow-1 justify-content-center">
     <!-- Edit User Form -->
    <div class="container w-70 py-5">
        <h3 class="mb-4">Edit Profile</h3>
        <form method="post" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3 col-8">
                <label for="name" class="form-label">User Name:</label>
                <input class="form-control" type="text" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3 col-8">
                <label for="bio" class="form-label">Bio:</label>
                <textarea class="form-control" name="bio">{{ $user->bio }}</textarea>
            </div>
            <div class="mb-3 col-8">
                <label for="job" class="form-label">Job:</label>
                <textarea class="form-control" name="job">{{ $user->job }}</textarea>
            </div>
            <div class="mb-3 col-8">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" name="address">{{ $user->address }}</textarea>
            </div>
            <div class="col-1">
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
