<!-- Project Card Link -->
<a href="{{ route('tasks.show', $task->id) }}" class="task-card-link"> <!-- Update href with the URL to the task page -->
    <div class="task-card">
        <div class="card-header">
            <h3>{{ $task->name }}</h3>
            <p>Creator Name: {{ $project->creator->name }}</p>
        </div>
        <div class="card-body">
            <p>{{ $task->label }}</p>
        </div>
        <div class="card-footer">
            @if ($task->completion == 'in_progress')
                <p>The task is in progress</p>
            @else
                <p>The task is {{ $task->completion }}</p>
            @endif
        </div>
    </div>
</a>