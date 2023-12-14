<!-- Create Task Form -->
<div class="container">
    <h2>Create Task</h2>
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <input type="hidden" name="id_project" value="{{ $project->id }}">
        <input type="hidden" name="completion" value="pending">
        <div class="mb-3 col-8">
            <label for="name" class="form-label">Task Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="mb-3 col-8">
            <label for="label" class="form-label">Task Label:</label>
            <textarea class = "form-control" name="label" id="description"></textarea>
        </div>
        <div class="mb-3 col-8">
            <label for="deadline" class="form-label">Deadline:</label>
            <input class="form-control" type="date" id="dateInput" name="due_date" required>
        </div>
        <div class="mb-3 col-8">
          <label for="priority" class="form-label">Priority:</label>
          <select class="form-select" aria-label="Priority" name = "priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
          </select>
        </div>
        <div class="mb-3 col-8">
            <label for="deadline" class="form-label">Assign to:</label>
            <div class="dropdown" id="assign-to-dropdown">
                <button class="btn btn-outline-secondary form-select" type="button" id="assignToDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Users
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assignToDropdownButton" id="assigned-users-list" style="padding: 10px;">
                    @foreach ($project->members as $member)
                        <li><input class="form-check-input" type="checkbox" name="assigned[]" value="{{ $member->id }}"> {{ $member->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-1">
            <button class="btn btn-primary btn-sm" type="submit">Create</button>
        </div>
    </form>
</div>
<script>
    // Handle dropdown item selection
    $('#assigned-users-list input[type="checkbox"]').on('change', function () {
        var selectedUsers = $('#assigned-users-list input:checked').map(function () {
            return $(this).val();
        }).get();

        // Update the button text with selected users
        $('#assignToDropdownButton').text(selectedUsers.length > 0 ? 'Selected Users' : 'Select Users');
    });
</script>
