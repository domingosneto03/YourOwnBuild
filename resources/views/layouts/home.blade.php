<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ url('css/project.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script type="text/javascript" src={{ url('js/app.js') }} defer></script>
    <script type="text/javascript" src={{ url('js/drag.js') }} defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src={{ url('js/comment.js') }} defer></script>
    <script type="text/javascript" src={{ url('js/task.js') }} defer></script>
    <script type="text/javascript" src={{ url('js/invite.js') }} defer></script>
    <script type="text/javascript" src={{ url('js/alerts.js') }} defer></script>
</head>
<body class="d-flex flex-column vh-100 m-0">
    <div class="d-flex flex-column flex-grow-1">
        <nav class="navbar navbar-expand-md mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">YourOwnBuild</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    @php 
                        $user = Auth::user();
                    @endphp
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                    @if ($user->is_admin)
                        <a class="nav-link active" aria-current="page" href="/admin/users">Home</a>
                    @else
                        <a class="nav-link active" aria-current="page" href="{{ route('homepage.projects') }}">Home</a>
                    @endif
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/profile_pic.jpeg') }}" alt="" width="32" height="32" class="rounded-circle me-2" alt="user avatar">
                        <strong>{{ $user->name }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="/user/{{ $user->id }}/profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        <main class="d-flex flex-grow-1">
            @yield('content')
        </main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show auto-close position-fixed bottom-0 end-0 p-3 mb-2 me-2" role="alert" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show auto-close position-fixed bottom-0 end-0 p-3 mb-2 me-2" role="alert" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show auto-close position-fixed bottom-0 end-0 p-3 mb-2 me-2" role="alert" role="alert">
                {{ session('warning') }}
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
