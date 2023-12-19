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

function searchUser(elem) {
    let name = elem.value;
    sendAjaxRequest('get', '/api/search/users?name=' + name, null, searchUserHandler);
}

function searchUserHandler() {
    try {
        let users = JSON.parse(this.responseText);
        let userCardsContainer = document.getElementById('userCards');
        userCardsContainer.innerHTML = ''; // Clear existing content

        users.forEach(user => {
            // Create elements
            let userCard = document.createElement('div');
            userCard.className = 'card row mt-1';
            let cardBody = document.createElement('div');
            cardBody.className = 'card-body';

            let cardTitle = document.createElement('h5');
            cardTitle.className = 'card-title';
            cardTitle.textContent = user.username;

            let cardSubtitle = document.createElement('h6');
            cardSubtitle.className = 'card-subtitle mb-2 text-muted';
            cardSubtitle.textContent = user.name;

            let btnGroup = document.createElement('div');
            btnGroup.className = 'btn-group';

            let profileLink = document.createElement('a');
            profileLink.href = '/user/' + user.id;
            profileLink.className = 'btn btn-outline-secondary btn-sm';
            profileLink.textContent = 'Profile';

            let blockButton = document.createElement('button');
            blockButton.id = 'block-user-' + user.id;
            blockButton.className = 'btn btn-danger btn-sm';
            blockButton.textContent = user.is_blocked ? 'Unblock' : 'Block';
            blockButton.addEventListener('click', function() {
                user.is_blocked ? unblockUserFunc(this) : blockUserFunc(this);
            });

            // Append elements
            btnGroup.appendChild(profileLink);
            btnGroup.appendChild(blockButton);

            cardBody.appendChild(cardTitle);
            cardBody.appendChild(cardSubtitle);
            cardBody.appendChild(btnGroup);

            userCard.appendChild(cardBody);
            userCardsContainer.appendChild(userCard);
        });
    } catch (error) {
        console.error('Error parsing JSON:', error);
    }
}

function searchProject(elem) {
    let name = elem.value;
    sendAjaxRequest('get', '/api/search/projects?name=' + name, null, searchProjectHandler);
}

function searchProjectHandler() {
    try {
        let projects = JSON.parse(this.responseText);
        let projectsContainer = document.getElementById('projectCards');
        projectsContainer.innerHTML = ''; // Clear existing content

        projects.forEach(project => {
            // Create elements
            let projectCard = document.createElement('div');
            projectCard.className = 'card row mt-1';

            let cardBody = document.createElement('div');
            cardBody.className = 'card-body';

            let cardTitle = document.createElement('h5');
            cardTitle.className = 'card-title';
            cardTitle.textContent = project.name;

            let cardSubtitle = document.createElement('h6');
            cardSubtitle.className = 'card-subtitle mb-2 text-muted';
            cardSubtitle.textContent = project.is_public ? 'Public project' : 'Private project';

            let cardText = document.createElement('p');
            cardText.className = 'card-text';
            cardText.textContent = project.description;

            let btnGroup = document.createElement('div');
            btnGroup.className = 'btn-group';

            let projectLink = document.createElement('a');
            projectLink.href = '/project/' + project.id;
            projectLink.className = 'btn btn-outline-secondary btn-sm';
            projectLink.textContent = 'Project';

            let deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.textContent = 'Delete';
            deleteButton.addEventListener('click', function() {
                delProjectFunc(this);
            });

            // Append elements
            btnGroup.appendChild(projectLink);
            btnGroup.appendChild(deleteButton);

            cardBody.appendChild(cardTitle);
            cardBody.appendChild(cardSubtitle);
            cardBody.appendChild(cardText);
            cardBody.appendChild(btnGroup);

            projectCard.appendChild(cardBody);
            projectsContainer.appendChild(projectCard);
        });
    } catch (error) {
        console.error('Error parsing JSON:', error);
    }
}


