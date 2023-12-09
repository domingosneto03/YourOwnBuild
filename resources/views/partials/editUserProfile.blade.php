<!-- Edit User Form -->
<div class="container">
    <h2>Edit Profile</h2>
    <form method="post" action="{{ route('user.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 col-8">
            <label for="name" class="form-label">User Name:</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3 col-8">
            <label for="bio" class="form-label">Bio:</label>
            <textarea class = "form-control" name="bio">{{ $user->bio }}</textarea>
        </div>
        <div class="mb-3 col-8">
            <label for="job" class="form-label">Job:</label>
            <textarea class = "form-control" name="job">{{ $user->job }}</textarea>
        </div>
        <div class="mb-3 col-8">
            <label for="address" class="form-label">Address:</label>
            <textarea class = "form-control" name="address">{{ $user->address }}</textarea>
        </div>
        <div class="col-1">
            <button class="btn btn-primary btn-sm" type="submit">Update</button>
        </div>
    </form>
</div>
