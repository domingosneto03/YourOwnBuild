Btn = document.getElementById("edit-project-btn")
Btn.addEventListener("click", function() {
    Page = document.getElementById("tasks-col") 

    // Fetch the content from the Laravel route
    fetch('/fetch-content')
    .then(response => response.json())
    .then(data => {
        // Set the innerHTML of the element to the content from the Laravel route
        Page.innerHTML = data.html;
    })
    .catch(error => console.error('Error fetching new content:', error));
})