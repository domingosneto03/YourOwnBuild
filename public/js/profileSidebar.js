document.getElementById("user-profile-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("user-profile-btn").className = "nav-link active"
    document.getElementById("edit-user-profile-btn").className = "nav-link link-body-emphasis"
    document.getElementById("invitations-btn").className = "nav-link link-body-emphasis"

    Page = document.getElementById("main-content");
    
    let path = window.location.pathname;
    let id = path.split('/user/')[1];

    // Fetch the content from the Laravel route
    fetch('/user/' + id + '/profile')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});

document.getElementById("edit-user-profile-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("user-profile-btn").className = "nav-link link-body-emphasis"
    document.getElementById("edit-user-profile-btn").className = "nav-link active"
    document.getElementById("invitations-btn").className = "nav-link link-body-emphasis"

    Page = document.getElementById("main-content");

    let path = window.location.pathname;
    let id = path.split('/user/')[1];

    // Fetch the content from the Laravel route
    fetch('/user/' + id + '/edit')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});

document.getElementById("invitations-btn").addEventListener("click", function() {
    // Change button colors
    document.getElementById("user-profile-btn").className = "nav-link link-body-emphasis"
    document.getElementById("edit-user-profile-btn").className = "nav-link link-body-emphasis"
    document.getElementById("invitations-btn").className = "nav-link active"

    Page = document.getElementById("main-content");

    let path = window.location.pathname;
    let id = path.split('/user/')[1];

    // Fetch the content from the Laravel route
    fetch('/user/' + id + '/invitations')
    .then(response => response.text())  // Use response.text() for HTML content
    .then(html => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = html;
    })
    .catch(error => console.error('Error fetching new content:', error));
});