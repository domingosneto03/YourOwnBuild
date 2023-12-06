<div id="id-task-{{ $task->id }}" class="card shadow-sm mt-3" draggable="true">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h1>
        <p class="card-text">{{ $task->label }}</p>
        <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <a href="../task/{{ $task->id }}" class="btn btn-sm btn-outline-secondary">View</a>
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