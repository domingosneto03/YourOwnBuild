@extends('layouts.home') <!-- Assuming you have a layout file -->

@section('content')
    <div class="task-details">
        <h2>{{ $task->name }}</h2>
        <p>Creator Name: {{ $task->creator->name }}</p>
        <p>Project: {{ $task->project->name }}</p>
        <p>Label: {{ $task->label }}</p>
        <p>Completion: {{ $task->completion }}</p>
        <p>Date Created: {{ $task->date_created->format('Y-m-d H:i:s') }}</p>
        <p>Due Date: {{ $task->due_date->format('Y-m-d H:i:s') }}</p>
        <p>Priority: {{ $task->priority }}</p>

        <!-- Add more details as needed -->

        <!-- Implement additional functionalities for the task page -->
    </div>
@endsection