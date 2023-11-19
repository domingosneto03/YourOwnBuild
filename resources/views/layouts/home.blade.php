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
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script type="text/javascript" src={{ url('js/app.js') }} defer>
    </script>
</head>
<body>

<div class="container">

    <!-- Search and profile icons -->
    <div class="dashboard-header">
        <div class="search-bar">
            <input type="search" name="search" placeholder="search">
            <button type="submit">Search</button>
        </div>
        <div class="user-profile">
            <!-- User profile icon -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <h2>V0B</h2>
            <p>YourOwnBuild</p>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="#">My projects</a></li>
                <li><a href="#">My team</a></li>
                <li><a href="#">Project tasks</a></li>
                <li><a href="#">Homepage</a></li>
                <li><a href="#">Labels</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <a href="#">About us</a>
            <a href="#">FAQ</a>
            <a href="#">Help?</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
</div>

<!-- Add your scripts here -->

</body>
</html>