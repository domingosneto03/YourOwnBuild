document.getElementById("homepage-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("homepage-btn").className = "nav-link active"
    document.getElementById("new-project-btn").className = "nav-link link-body-emphasis"

    Page = document.getElementById("main-content");

    // Fetch the content from the Laravel route
    fetch('/project/' + id + '/tasks')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});