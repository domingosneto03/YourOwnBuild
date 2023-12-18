function searchProjectDiscover(elem) {
    let name = elem.value;
    sendAjaxRequest('get', '/api/search/projects?name=' + name, null, searchProjectDiscoverHandler);
}

function searchProjectDiscoverHandler() {
    try {
        let projects = JSON.parse(this.responseText);
        let projectCardsContainer = document.getElementById('projectCards');
        projectCardsContainer.innerHTML = '';

        projects.forEach(project => {
            // Create elements
            let colDiv = document.createElement('div');
            colDiv.className = 'col';

            let cardDiv = document.createElement('div');
            cardDiv.className = 'card shadow-sm';

            let cardBodyDiv = document.createElement('div');
            cardBodyDiv.className = 'card-body';

            let cardTitle = document.createElement('h5');
            cardTitle.className = 'card-title';
            cardTitle.textContent = project.name;

            let cardText = document.createElement('p');
            cardText.className = 'card-text';
            cardText.textContent = project.description;

            let buttonContainerDiv = document.createElement('div');
            buttonContainerDiv.className = 'd-flex justify-content-between align-items-center';

            let joinButton = document.createElement('button');
            joinButton.className = 'btn btn-outline-success btn-sm';

            if (project.joinRequests && project.joinRequests.includes(user.id)) {
                joinButton.textContent = 'Requested';
                joinButton.disabled = true;
            } else {
                let form = document.createElement('form');
                form.action = '/your/request/route'; // Replace with your actual route
                form.method = 'post';

                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = 'your_csrf_token'; // Replace with your actual CSRF token

                let submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.className = 'btn btn-outline-success btn-sm';
                submitButton.textContent = 'Request to Join';

                form.appendChild(csrfInput);
                form.appendChild(submitButton);
                buttonContainerDiv.appendChild(form);
            }

            // Append elements
            cardBodyDiv.appendChild(cardTitle);
            cardBodyDiv.appendChild(cardText);
            cardBodyDiv.appendChild(buttonContainerDiv);

            cardDiv.appendChild(cardBodyDiv);
            colDiv.appendChild(cardDiv);
            projectCardsContainer.appendChild(colDiv);
        });
    } catch (error) {
        console.error('Error parsing JSON:', error);
    }
}
