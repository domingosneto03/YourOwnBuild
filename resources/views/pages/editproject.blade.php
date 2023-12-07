<!-- Edit Project Form -->
<div class="container">
    <h2>Edit Project</h2>
    <form method="post" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 col-8">
            <label for="name" class="form-label">Project Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $project->name }}" required>
        </div>
        <div class="mb-3 col-8">
            <label for="description" class="form-label">Description:</label>
            <textarea class = "form-control" name="description" id="description">{{ $project->description }}</textarea>
        </div>
        <div class="mb-3 col-8">
            <select class="form-select" aria-label="Privacy" name = "is_public">
              <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
              <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
            </select>
        </div>
        <div class="col-1">
            <button class="btn btn-primary btn-sm" type="submit">Update</button>
        </div>
    </form>
</div>
