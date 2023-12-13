<div class="album py-5 bg-body-tertiary flex-grow-1">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($projects as $project)
                <div class="col">
                    <div id="id-project-{{ $project->id }}" class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h1>
                            <p class="card-text">{{ $project->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="../project/{{ $project->id }}" class="btn btn-sm btn-outline-secondary">View</a>      
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>