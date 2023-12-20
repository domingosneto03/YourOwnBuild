<div id="id-task-{{ $task->id }}" class="card shadow-sm mt-3" draggable="true">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h5>
        <p class="card-text">{{ $task->label }}</p>
        <div class="d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#task-modal-{{ $task->id }}">View</button>
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
<div class="modal fade" id="task-modal-{{ $task->id }}" tabindex="-1" aria-labelledby="task-modal-label-{{ $task->id }}" aria-hidden="true" data-task-id="{{ $task->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $task->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="flex: 1; display: grid; grid-template-rows: 1fr auto;">
                    <div class="row">
                        <!-- Left Column for Task Info -->
                        <div class="col-md-4">
                            <div id="task-info-section-{{ $task->id }}">
                                <div class="mb-4 mt-3">
                                    <h6 class="card-title">Creator Name:</h6>
                                    <p class="card-text">{{ $task->creator->name }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-title">Label:</h6>
                                    <p class="card-text">{{ $task->label }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-title">Date Created:</h6>
                                    <p class="card-text">{{ $task->date_created->format('Y-m-d') }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-title">Deadline:</h6>
                                    <p class="card-text">{{ $task->due_date->format('Y-m-d') }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-title">Priority:</h6>
                                    <p class="card-title">{{ $task->priority }}</p>
                                </div>
                                <div class="d-flex my-4">
                                    <button class="btn btn-outline-secondary btn-sm" onclick="editTask('{{ $task->id }}')">Edit Task</button> 
                                    <button class="btn btn-outline-danger btn-sm ms-2" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this task?')) document.getElementById('delete-task-form-{{ $task->id}}').submit();">Delete Task</button> 
                                </div>
                                <form method="post" action="{{ route('tasks.destroy', $task->id) }}" id="delete-task-form-{{ $task->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            <div  id="edit-task-form-container-{{ $task->id }}" style="display: none;">
                                <form method="post" action="{{ route('tasks.update', ['id' => $task->id]) }}" class="edit-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_project" value="{{ $project->id }}">

                                    <div class="my-3">
                                        <label for="name" class="form-label">Task Name:</label>
                                        <input class="form-control form-control-sm" type="text" name="name" id="name" value="{{ $task->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="label" class="form-label">Task Label:</label>
                                        <input class="form-control form-control-sm" type="text" name="label" id="label" value="{{ $task->label }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="completion" class='form-label'>Status:</label>
                                        <select class='form-select form-select-sm' aria-label="Completion" name="completion" id="completion">
                                            <option value="pending" {{ $task->completion === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="in_progress" {{ $task->completion === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $task->completion === 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dateInput" class="form-label">Deadline:</label>
                                        <input class="form-control form-control-sm" type="date" id="dateInput" name="due_date" value="{{ $task->due_date }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="priority" class='form-label'>Priority:</label>
                                        <select class='form-select form-select-sm' aria-label="Priority" name="priority">
                                            <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                                            <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
                                        </select>
                                    </div>
                                    <div class="d-flex my-3">
                                        <button class="btn btn-outline-secondary btn-sm" onclick="cancelEdit('{{ $task->id }}')">Cancel</button>
                                        <button class="btn btn-outline-primary btn-sm ms-2" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Middle Column for Assigned Info -->
                        <div class="col-md-3">
                            <div id="assigned-{{ $task->id }}">
                                <h6 class="card-title my-3">Assigned to:</h6>
                                <div style="max-height: 40vh; overflow-y: auto;">
                                    <ul class="list-group">
                                        @foreach($task->responsibleUsers as $user)
                                                <li class="list-group-item">{{ $user->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button class="btn btn-outline-secondary btn-sm my-3" onclick="editAssign('{{ $task->id }}')">Reassign</button>
                            </div>
                            <div id="reassign-{{ $task->id }}" style="display: none;">
                                <h6 class="card-title my-3">Assigned to:</h6>
                                <form method="post" action="{{ route('tasks.updateAssign', ['id' => $task->id]) }}" class="edit-form">
                                    @csrf
                                    @method('PUT')
                                    <ul class="card" style="padding: 10px; list-style: none;">
                                        @foreach ($project->members as $member)
                                            <li><input class="form-check-input" type="checkbox" name="assigned[]" value="{{ $member->id }}"> {{ $member->name }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="d-flex my-3">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="cancelAssign('{{ $task->id }}')">Cancel</button>
                                        <button class="btn btn-outline-primary btn-sm ms-2" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>   
                        </div>
                        <!-- Right Column for Comments Section -->
                        <div class="col-md-5 border-start">
                            <div class="modal-header">
                                <h5 class="modal-title">Comments</h5>
                            </div>
                            <div class="modal-body" id="comments-body-{{ $task->id }}" style="max-height: 45vh; min-height: 45vh; overflow-y: auto;">
                                <!-- Existing comments will be displayed here -->
                                @foreach($task->comments as $comment)
                                    <div class="card mb-2 position-relative" id="comment-{{ $comment->id }}">
                                        <div class="card-body card-sm mb-0">
                                            <h6 class="card-title">{{ $comment->user->name }}:</h6>
                                            <p class="card-text mb-0"> {{ $comment->content }}</p>
                                            @if(auth()->user()->id == $comment->user->id)
                                                <button class="btn btn-outline-danger btn-sm position-absolute top-0 end-0 m-2" onclick="deleteComment('{{ $comment->id }}')">Delete</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Write a comment..." id="comment-input-{{ $task->id }}">
                                    <button class="btn btn-outline-success ms-2" onclick="submitComment('{{ $task->id }}', '{{ auth()->user()->name }}')">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>