<!-- Project Card Link -->
<a href="/task/{{ $task->id }}" class="task-card-link"> <!-- Update href with the URL to the task page -->
    <div class="task-card">
        <div class="card-header">
            <h3>{{ $task->name }}</h3>
            <p>Creator Name: {{ $project->creator->name }}</p>
        </div>
        <div class="card-body">
            <p>{{ $task->label }}</p>
        </div>
        <div class="card-footer">
            <p>The task is {{ $task->label }}</p>
        </div>
    </div>
</a>