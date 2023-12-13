<div class="container">
    <div class="col">
        @foreach ($users as $user)
            <div class="card row">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->username }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user->name }}</h6>
                    <div class="btn-group">
                        <a href="/user/{{ $user->id }}" class="btn btn-outline-secondary btn-sm">Profile</a>
                        @if ($user->is_blocked)
                            <button id="block-user-{{ $user->id }}" onclick="unblockUserFunc()" class="btn btn-danger btn-sm unblock-user-btn">Unblock</a>
                        @else
                            <button id="block-user-{{ $user->id }}" class="btn btn-danger btn-sm block-user-btn">Block</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
