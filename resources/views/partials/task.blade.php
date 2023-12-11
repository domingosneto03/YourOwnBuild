<div id="id-task-{{ $task->id }}" class="card shadow-sm mt-3" draggable="true">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h5>
        <p class="card-text">{{ $task->label }}</p>
        <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#task-modal-{{ $task->id }}">View</button>
            <a href="../task/{{ $task->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
        </div>
        @php
            $deadline = $task->due_date;
            $now = new DateTime();
            $interval = $now->diff($deadline);
            $daysLeft = $now->diff($deadline)->format("%r%a");
        @endphp
        @if ($daysLeft == -1)
            <small class="text-body-secondary fw-bold">Deadline yesterday</small>
        @elseif ($daysLeft < 0)
            <small class="text-body-secondary fw-bold">Deadline {{ $interval->format("%a") }} days ago</small>
        @elseif ($daysLeft == 0)
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
<div class="modal fade" id="task-modal-{{ $task->id }}" tabindex="-1" aria-labelledby="task-modal-label-{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $task->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Column for Task Info -->
                        <div class="col-md-4">
                            <p class="card-text mb-5">Creator Name: {{ $task->creator->name }}</p>
                            <p class="card-text mb-5">Label: {{ $task->label }}</p>
                            <p class="card-text mb-5">Date Created: {{ $task->date_created->format('Y-m-d') }}</p>
                            <p class="card-text mb-5">Deadline: {{ $task->due_date->format('Y-m-d') }}</p>
                            <p class="card-text mb-5">Priority: {{ $task->priority }}</p>
                        </div>
                        <!-- Middle Column for Assigned Info -->
                        <div class="col-md-2">
                            <p class="card-text">Assigned to:</p>
                            @foreach($task->responsibleUsers as $user)
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">{{ $user->name }}</p>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                        <!-- Right Column for Comments Section -->
                        <div class="col-md-6 border-start">
                            <div class="modal-header">
                                <h5 class="modal-title">Comments</h5>
                            </div>
                            <div class="modal-body" id="comments-body">
                            <!-- Existing comments will be displayed here -->
                                @foreach($task->comments as $comment)
                                    <div class="card mb-2 card-sm">
                                        <div class="card-body">
                                            <h6 class="card-title" id="comment-author">{{ $comment->user->name }}:</h6>
                                            <p class="card-text"> {{ $comment->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Write a comment..." id="comment-input">
                                    <button class="btn btn-primary" onclick="submitComment()">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>