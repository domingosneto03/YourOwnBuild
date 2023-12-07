@extends('layouts.home')

@section('content')
<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('homepage') }}" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Home
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Orders
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Products
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Customers
      </a>
    </li>
  </ul>
  <hr>
</div>
<main class="main-content">
    <h1>Create Task</h1>

    <form method="post" action="{{ route('tasks.store') }}" class="create-form">
        @csrf
        <input type="hidden" name="id_project" value="{{ $project->id }}">
        <label for="name" class="simple">Task Name:</label>
        <input class="input" type="text" name="name" id="name" required>

        <label for="label" class="simple">Task Label:</label>
        <input class="input" type="text" name="label" id="label" required>
        
        <label for="completion" class='options'>Status:</label>
        <select class='selection' name="completion" id="completion">
            <option value="pending">Pending</option>
        </select>

        <label for="dateInput" class="simple">Select a Date:</label>
        <input class="input" type="date" id="dateInput" name="due_date" required>

        <label for="priority" class='options'>Priority:</label>
        <select class='selection' name="priority" id="is_public">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <button class="button" type="submit">Create</button>
    </form>
</main>
@endsection
