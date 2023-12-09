<div class="container py-5">
  <div class="row">
    <div class="col">
      <p>User Profile</p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
          <h5 class="my-3">{{ $user->name }}</h5>
          <p class="text-muted mb-1">{{ $user->job }}</p>
          <p class="text-muted mb-4">{{ $user->address }}</p>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Username</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->username }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->email }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Bio</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->bio }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4 mb-md-0">
        <div class="card-body">
          <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
          </p>
          <p class="mb-1" style="font-size: .77rem;">Web Design</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
          <div class="progress rounded mb-2" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>