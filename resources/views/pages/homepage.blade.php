<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <!-- Add your stylesheet links here -->
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
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
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Search and profile icons -->
        <header class="dashboard-header">
            <div class="search-bar">
                <input type="search" name="search" placeholder="search">
                <button type="submit">Search</button>
            </div>
            <div class="user-profile">
                <!-- User profile icon -->
            </div>
        </header>

        <!-- Projects List -->
        <section class="projects-list">
            @foreach ($projects as $project)
                <div class="project-card">
                    <div class="card-header">
                        <h3>{{ $project->name }}</h3>
                        <p>Coordinator Name: {{ $project->coordinator->name }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <span>{{ $project->tasks_count }} tasks</span>
                    </div>
                </div>
            @endforeach
        </section>
    </main>
</div>

<!-- Add your scripts here -->

</body>
</html>
