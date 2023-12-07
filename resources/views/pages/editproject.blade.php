<!-- Edit Project Form -->
<div class="container">
    <h2>Edit Project</h2>
    <form method="post" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="name" class="form-control" />
            <label class="form-label" for="name" value="{{ $project->name }}" required class="input">Project Name</label>
        </div>

        <!-- Message input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="description" rows="4">{{ $project->description }}</textarea>
            <label class="form-label" for="description">Description</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <select class='selection' name="is_public" id="is_public">
                <option value="0" {{ $project->is_public === 0 ? 'selected' : '' }}>Private</option>
                <option value="1" {{ $project->is_public === 1 ? 'selected' : '' }}>Public</option>
            </select>
            <label class="form-label" for="is_public">Privacy</label>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Update</button>
    </form>
</div>