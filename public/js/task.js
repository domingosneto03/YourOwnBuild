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


function editAssign(taskId) {
    if (taskId) {
        // Hide the task info section for the specific task
        $("#assigned-" + taskId).hide();

        // Show the edit form container for the specific task
        $("#reassign-" + taskId).show();
    }
}

function cancelAssign(taskId) {
    if (taskId) {
        // Hide the edit form container for the specific task
        $("#reassign-" + taskId).hide();

        // Show the task info section for the specific task
        $("#assigned-" + taskId).show();
    }
}


