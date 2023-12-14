<div class="container">
    <div class="col">
        @foreach ($projects as $project)
            <div id="proj-card-{{ $project->id }}" class="card row">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    @if ($project->is_public)
                        <h6 class="card-subtitle mb-2 text-muted">Public project</h6>
                    @else
                        <h6 class="card-subtitle mb-2 text-muted">Private project</h6>
                    @endif
                    <p class="card-text">{{ $project->description }}</p>
                    <div class="btn-group">
                        <a href="/project/{{ $project->id }}" class="btn btn-outline-secondary btn-sm">Project</a>
                        <button id="del-proj-{{ $project->id }}" onclick="delProjectFunc(this);" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
