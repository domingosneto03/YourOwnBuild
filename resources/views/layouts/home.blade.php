<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('css/home.css') }}" rel="stylesheet">
    <link href="{{ url('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ url('css/project.css') }}" rel="stylesheet">
    <link href="{{ url('css/create.css') }}" rel="stylesheet">
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script type="text/javascript" src={{ url('js/app.js') }} defer>
    </script>
</head>
<body>

<div class="container">
    <!-- Topnav bar -->
    <div class="topnav">
        <a class="active" href="#homepage">YourOwnBuild</a>
        <input type="text" placeholder="Search..">
        <div class="user-profile">
            <a href="/users/"> <!-- Update the href value to the actual profile page URL -->
                <img src="{{ asset('img/profile_pic.jpeg') }}" alt="User Profile" style="width: 50px; height: 50px; border-radius: 50%;">
            </a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">My Projects</a>
        <a href="#">My Team</a>
        <a href="#">Project Tasks</a>
        <a href="#">Homepage</a>
        <a href="#">Labels</a>
        <a href="#">Settings</a>
        <a href="#">About Us</a>
        <a href="#">FAQ</a>
        <a href="#">Help</a>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
</div>

<!-- Add your scripts here -->

</body>
</html>
