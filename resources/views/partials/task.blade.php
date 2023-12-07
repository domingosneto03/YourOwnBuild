<div id="id-task-{{ $task->id }}" class="card shadow-sm mt-3" draggable="true">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h1>
        <p class="card-text">{{ $task->label }}</p>
        <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <a href="#" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#taskOverlay">View</a>
            <a href="../task/{{ $task->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
        </div>
        @php
            $deadline = $task->due_date;
            $now = new DateTime();
            $daysLeft = $now->diff($deadline)->format("%d");
        @endphp
        @if ($daysLeft == 0)
            <small class="text-body-secondary">Deadline today</small>
        @elseif ($daysLeft == 1)
            <small class="text-body-secondary">Deadline tomorrow</small>
        @else 
            <small class="text-body-secondary">Deadline in {{ $daysLeft }} days</small>
        @endif
        </div>
    </div>
</div>

<!-- Modal overlay for the task -->
<div class="modal fade" id="taskOverlay" tabindex="-1" role="dialog" aria-labelledby="taskOverlayLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskOverlayLabel">Task Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>{{ $task->name }}</h2>
                <p>Creator Name: {{ $task->creator->name }}</p>
                <p>Project: {{ $task->project->name }}</p>
                <p>Label: {{ $task->label }}</p>
                <p>Completion: {{ $task->completion }}</p>
                <p>Date Created: {{ $task->date_created->format('Y-m-d') }}</p>
                <p>Due Date: {{ $task->due_date->format('Y-m-d') }}</p>
                <p>Priority: {{ $task->priority }}</p>
            </div>
        </div>
    </div>
</div>