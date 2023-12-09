<div class="col">
    <div id="id-project-{{ $project->id }}" class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h1>
            <p class="card-text">{{ $project->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="../project/{{ $project->id }}" class="btn btn-sm btn-outline-secondary">View</a>
            </div>
            @php
                $tasksCount = $project->tasks->count();

                if ($tasksCount > 0) {
                    $closestTask = $project->closestDeadlineTask()->first();
                    $closestDeadline = $closestTask->due_date;
                    $now = new DateTime();
                    $interval = $now->diff($closestDeadline);
                    $daysLeft = $now->diff($closestDeadline)->format("%r%a");
                }
            @endphp
            @if ($tasksCount == 0)
                <small class="text-body-secondary"></small>
            @elseif ($daysLeft == -1)
                <small class="text-body-secondary fw-bold">Deadline yesterday</small>
            @elseif ($daysLeft < 0)
                <small class="text-body-secondary fw-bold">Deadline {{ $interval->format("%a") }} days ago</small>
            @elseif ($daysLeft == 0)
                <small class="text-body-secondary">Next deadline today</small>
            @elseif ($daysLeft == 1)
                <small class="text-body-secondary">Next deadline tomorrow</small>
            @else 
                <small class="text-body-secondary">Next deadline in {{ $daysLeft }} days</small>
            @endif
            </div>
        </div>
    </div>
</div>