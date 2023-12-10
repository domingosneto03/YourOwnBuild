function editTask(taskId) {
    if (taskId) {
        // Hide the task info section for the specific task
        $("#task-info-section-" + taskId).hide();

        // Show the edit form container for the specific task
        $("#edit-task-form-container-" + taskId).show();
    }
}

function cancelEdit(taskId) {
    if (taskId) {
        // Hide the edit form container for the specific task
        $("#edit-task-form-container-" + taskId).hide();

        // Show the task info section for the specific task
        $("#task-info-section-" + taskId).show();
    }
}


function updateTask() {
    $("#edit-task-form-container").hide();
    // Handle the form submission via AJAX
    $.ajax({
        url: "/tasks/" + taskId, // Adjust the URL based on your routes
        type: 'PUT',
        data: $(".edit-form").serialize(), // Serialize form data
        success: function () {        
            // Show the task info section again
            $("#task-info-section").show();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

