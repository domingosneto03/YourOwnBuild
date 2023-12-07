Btn = document.getElementById("edit-project-btn")
Btn.addEventListener("click", function() {
    Page = document.getElementById("tasks-col");

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
