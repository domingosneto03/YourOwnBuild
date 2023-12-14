<div class="album py-1 bg-body-tertiary flex-grow-1">
    <div class="container">
        <h3 class="mb-4">Discover New Projects</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($projects as $project)
                @if (!$project->members->contains('id', $user->id) && $project->is_public)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h1>
                                <p class="card-text">{{ $project->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if ($project->joinRequests->contains('id', $user->id))
                                        <button class="btn btn-outline-secondary btn-sm" disabled>Requested</button>
                                    @else
                                        <form action="{{ route('project.request', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-outline-success btn-sm">Request to Join</button>
                                        </form>
                                    @endif   
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>