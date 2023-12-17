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