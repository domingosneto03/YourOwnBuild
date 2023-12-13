<!-- team.blade.php -->
<div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-team-tab" data-bs-toggle="tab" data-bs-target="#nav-team" type="button" role="tab" aria-controls="nav-team" aria-selected="true">My Team</button>
            <button class="nav-link" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">Requests</button>
            <button class="nav-link" id="nav-add-user-tab" data-bs-toggle="tab" data-bs-target="#nav-add-user" type="button" role="tab" aria-controls="nav-add-user" aria-selected="false">Add User</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-team" role="tabpanel" aria-labelledby="nav-team-tab" tabindex="0">
            <div class="row mt-4">
                @foreach($project->members as $member)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">{{ $member->name }}</h5>
                                @if($member->id == auth()->id())
                                    <a href="{{ route('profile.show', $member->id) }}" class="btn btn-outline-secondary btn-sm">Visit Profile</a>
                                @else
                                    <a href="#" class="btn btn-outline-secondary btn-sm">Visit Profile</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
            <div class="row mt-4">
                @foreach($project->joinRequests as $request)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">{{ $request->name }}</h5>
                                <div class="d-flex">
                                    <form action="{{ route('requests.accept', ['id_user' => $request->id, 'id_project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-success btn-sm">Accept</button>
                                    </form>
                                    <form action="{{ route('requests.refuse', ['id_user' => $request->id, 'id_project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-danger btn-sm ms-2">Refuse</button>
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="nav-add-user" role="tabpanel" aria-labelledby="nav-add-user-tab" tabindex="0">
            <h5 class="mt-3">Suggestions</h5>
            <div class="row mt-4">
                @php
                    $nonMembers = $users->reject(function ($user) use ($project) {
                        return $project->members->contains('id', $user->id);
                    })->shuffle()->take(12);
                @endphp
                @foreach($nonMembers as $user)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">{{ $user->name }}</h5>
                                    <form action="{{ route('project.invite', ['id_user' => $user->id, 'id_project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">Invite</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>