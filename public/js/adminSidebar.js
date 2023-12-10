document.getElementById("users-admin-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("users-admin-btn").className = "nav-link active"
    document.getElementById("projects-admin-btn").className = "nav-link link-body-emphasis"

    Page = document.getElementById("main-content");

    // Fetch the content from the Laravel route
    fetch('/admin/users')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});

document.getElementById("projects-admin-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("users-admin-btn").className = "nav-link link-body-emphasis"
    document.getElementById("projects-admin-btn").className = "nav-link active"

    Page = document.getElementById("main-content");

    // Fetch the content from the Laravel route
    fetch('/admin/projects')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});