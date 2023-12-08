document.getElementById("edit-project-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("project-tasks-btn").className = "nav-link link-body-emphasis"
    document.getElementById("project-team-btn").className = "nav-link link-body-emphasis"
    document.getElementById("edit-project-btn").className = "nav-link active"
    document.getElementById("new-task-btn").className = "nav-link link-body-emphasis"

    Page = document.getElementById("main-content");

    // Get the current path
    let path = window.location.pathname;

    let id = path.split('/project/')[1];

    console.log(id);

    if (id) {
        // Fetch the content from the Laravel route
        fetch('/project/' + id + '/edit')
        .then(response => response.text())  // Use response.text() for HTML content
        .then(html => {
            // Set the innerHTML of the element to the content from the Laravel route
            Page.innerHTML = html;
        })
        .catch(error => console.error('Error fetching new content:', error));
    } else {
        console.error('Unable to extract project id from the URL');
    }
});
