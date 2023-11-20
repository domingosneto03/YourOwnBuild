@extends('layouts.home')

@section('content')
<!-- Projects List -->
<section class="tasks-list">
    @php 
        $tasks = $project->tasks()->get();
    @endphp
    @foreach ($tasks as $task)
        <!-- Project Card Link -->
        <a href="/task/{{ $task->id }}" class="task-card-link"> <!-- Update href with the URL to the project page -->
            <div class="task-card">
                <div class="card-header">
                    <h3>{{ $task->name }}</h3>
                    <p>Creator Name: {{ $project->creator->name }}</p>
                </div>
                <div class="card-body">
                    <p>{{ $task->label }}</p>
                </div>
                <div class="card-footer">
                    @if ($task->is_completed)
                        <p>The task has been finished.</p>
                    @else
                        <p>The task is not finished.</p>
                    @endif
                </div>
            </div>
        </a>
    @endforeach
</section>
@endsection