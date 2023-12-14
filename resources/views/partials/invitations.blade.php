<div class="album py-1 bg-body-tertiary flex-grow-1">
    <div class="container">
        <h3 class="mb-4">Project Invitations</h3>
        @if ($user->invited->isEmpty())
            <div class="alert alert-info" role="alert">
                No project invitations at the moment.
            </div>
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($user->invited as $project)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h1>
                                <p class="card-text">{{ $project->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <form action="{{ route('invite.accept', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-outline-success btn-sm">Accept</button>
                                        </form>
                                        <form action="{{ route('invite.refuse', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-outline-danger btn-sm ms-2">Refuse</button>
                                        </form>
                                    </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>