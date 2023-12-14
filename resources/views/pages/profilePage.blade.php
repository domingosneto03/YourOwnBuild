@extends('layouts.home')

@section('content')
<script type="text/javascript" src={{ url('js/profileSidebar.js') }} defer></script>

<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" id="user-profile-btn" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Profile
      </a>
    </li>
    <li>
      <a href="#" id="edit-user-profile-btn" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Edit Profile
      </a>
    </li>
    <li>
      <a href="#" id="invitations-btn" class="nav-link link-body-emphasis">
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
  @include('partials.userprofile')
</div>
@endsection
