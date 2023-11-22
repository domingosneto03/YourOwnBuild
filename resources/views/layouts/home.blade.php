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
    <script type="text/javascript" src={{ url('js/search.js') }} defer></script>
</head>
<body>

<div class="container">
    <!-- Topnav bar -->
    <div class="topnav">
        <a class="active" href="../homepage/">YourOwnBuild</a>
        <!-- <input type="text" placeholder="Search.."> -->
        <form>
            <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search users..">
            <div id="livesearch"></div>
        </form>
        <div class="user-profile">
            <a href="/users/"> <!-- Update the href value to the actual profile page URL -->
                <img src="{{ asset('img/profile_pic.jpeg') }}" alt="User Profile" style="width: 50px; height: 50px; border-radius: 50%;">
            </a>
        </div>
    </div>

    @yield('content')
</div>

<!-- Add your scripts here -->

</body>
</html>
