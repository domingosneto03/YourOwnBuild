<!-- Create Project Form -->
<div class="container">
    <h2>Create Project</h2>
    <form method="post" action="{{ route('projects.store') }}">
        @csrf
        <div class="mb-3 col-8">
            <label for="name" class="form-label">Project Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="mb-3 col-8">
            <label for="description" class="form-label">Description:</label>
            <textarea class = "form-control" name="description" id="description"></textarea>
        </div>
        <div class="mb-3 col-8">
            <select class="form-select" aria-label="Privacy" name = "is_public">
                <option value="0">Private</option>
                <option value="1">Public</option>
            </select>
        </div>
        <div class="col-1">
            <button class="btn btn-primary btn-sm" type="submit">Create</button>
        </div>
    </form>
</div>
