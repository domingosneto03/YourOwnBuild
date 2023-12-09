function submitComment(taskId, userName) {
    // Get the comment content from the input field
    var commentContent = document.getElementById('comment-input-' + taskId).value;

    // Log the taskId, user name, and comment content to the console for debugging
    console.log('Task ID:', taskId);
    console.log('User Name:', userName);
    console.log('Comment Content:', commentContent);

    // You may want to perform additional validation here

    // Append the new comment to the comments body of the specific task
    var commentsBody = document.getElementById('comments-body-' + taskId);
    console.log('Comments Body:', commentsBody);

    var newComment = '<div class="card mb-2 card-sm"><div class="card-body"><h6 class="card-title">' + userName + ':</h6><p class="card-text">' + commentContent + '</p></div></div>';
    commentsBody.innerHTML += newComment;

    // Clear the input field
    document.getElementById('comment-input-' + taskId).value = '';
}
