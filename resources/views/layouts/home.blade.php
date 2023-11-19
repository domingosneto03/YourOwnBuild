<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <!-- Add your stylesheet links here -->
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
