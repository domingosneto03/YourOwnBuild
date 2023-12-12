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

function blockUserFunc() {
    // Change button
    let id = this.id.split('-')[2];
    this.innerHTML = 'Unblock';
    this.className = 'btn btn-danger btn-sm unblock-user-btn';
    this.removeEventListener("click", blockUserFunc);
    this.addEventListener("click", unblockUserFunc);
    
    // Send a PUT request to the Laravel route
    sendAjaxRequest('put', '/user/' + id + '/block', { id: id }, emptyHandler);
}

// Get all elements with the class "block-user-btn"
let blockUserButtons = document.getElementsByClassName("block-user-btn");

// Loop through the collection and add an event listener to each element
for (let i = 0; i < blockUserButtons.length; i++) {
    blockUserButtons[i].addEventListener("click", blockUserFunc);
}

function unblockUserFunc() {
    // Change button
    let id = this.id.split('-')[2];
    this.innerHTML = 'Block';
    this.className = 'btn btn-danger btn-sm block-user-btn';
    this.removeEventListener("click", unblockUserFunc);
    this.addEventListener("click", blockUserFunc);

    // Send a PUT request to the Laravel route
    sendAjaxRequest('put', '/user/' + id + '/unblock', { id: id }, emptyHandler);
}

// Get all elements with the class "unblock-user-btn"
let unblockUserButtons = document.getElementsByClassName("unblock-user-btn");

// Loop through the collection and add an event listener to each element
for (let i = 0; i < unblockUserButtons.length; i++) {
    unblockUserButtons[i].addEventListener("click", unblockUserFunc);
}

// Get all elements with the class "del-proj-btn"
let delProjectButtons = document.getElementsByClassName("del-proj-btn");

// Loop through the collection and add an event listener to each element
for (let i = 0; i < delProjectButtons.length; i++) {
    delProjectButtons[i].addEventListener("click", function() {
        // Change button
        let id = this.id.split('-')[2];
        this.remove();

        // Send a PUT request to the Laravel route
        sendAjaxRequest('delete', '/projects/' + id, { id: id }, emptyHandler);
    });
}
