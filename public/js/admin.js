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

function blockUserFunc(elem) {
    // Change button
    let id = elem.id.split('-')[2];
    elem.innerHTML = 'Unblock';
    elem.setAttribute( "onClick", "javascript: unblockUserFunc(this);" );
    
    // Send a PUT request to the Laravel route
    sendAjaxRequest('put', '/user/' + id + '/block', { id: id }, emptyHandler);
}

function unblockUserFunc(elem) {
    // Change button
    let id = elem.id.split('-')[2];
    elem.innerHTML = 'Block';
    elem.setAttribute( "onClick", "javascript: blockUserFunc(this);" );

    // Send a PUT request to the Laravel route
    sendAjaxRequest('put', '/user/' + id + '/unblock', { id: id }, emptyHandler);
}

// Loop through the collection and add an event listener to each element
function delProjectFunc(elem) {
    // Change button
    let id = elem.id.split('-')[2];

    let cardElem = document.getElementById('proj-card-' + id);
    cardElem.remove();

    // Send a DELETE request to the Laravel route
    sendAjaxRequest('delete', '/admin/project/delete', { id: id }, emptyHandler);
}