@extends('layouts.home')

@section('content')
<!-- Projects List -->
<section class="tasks-list">
    @php 
        $tasks = $project->tasks()->get();
        $pendingTasks = $tasks->where('completion', 'pending');
        $inProgressTasks = $tasks->where('completion', 'in_progress');
        $completedTasks = $tasks->where('completion', 'completed');
    @endphp
    <div class="task-category">
        <h2>Pending</h2>
        @foreach ($pendingTasks as $task)
            @include('partials.task', ['task' => $task])
        @endforeach
    </div>
    <div class="task-category">
        <h2>In Progress</h2>
        @foreach ($inProgressTasks as $task)
            @include('partials.task', ['task' => $task])
        @endforeach
    </div>
    <div class="task-category">
        <h2>Completed</h2>
        @foreach ($completedTasks as $task)
            @include('partials.task', ['task' => $task])
        @endforeach
    </div>
</section>
@endsection