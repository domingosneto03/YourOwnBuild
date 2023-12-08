<div id="id-task-{{ $task->id }}" class="card shadow-sm mt-3" draggable="true">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h5>
        <p class="card-text">{{ $task->label }}</p>
        <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $task->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Column for Task Info -->
                        <div class="col-md-4">
                            <p class="card-text mb-5">Creator Name: {{ $task->creator->name }}</p>
                            <p class="card-text mb-5">Label: {{ $task->label }}</p>
                            <p class="card-text mb-5">Status: {{ $task->completion }}</p>
                            <p class="card-text mb-5">Date Created: {{ $task->date_created->format('Y-m-d') }}</p>
                            <p class="card-text mb-5">Deadline: {{ $task->due_date->format('Y-m-d') }}</p>
                            <p class="card-text mb-5">Priority: {{ $task->priority }}</p>
                        </div>
                        <!-- Middle Column for Assigned Info -->
                        <div class="col-md-3">
                            <p class="card-text">Assign to:</p>
                            <!-- assigned table-->
                            <p> hmm </p> 
                        </div>
                        <!-- Right Column for Comments Section -->
                        <div class="col-md-5 border-start">
                            <div class="modal-header">
                                <h5 class="card-title">Comments</h5>
                            </div>
                            <div class="modal-body">
                               <!-- comments-->
                               <p> hmm </p> 
                            </div>
                            <div class="modal-footer">
                               <!-- input and send--> 
                               <p> hmm </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>