function submitComment() {
    // Get the comment content from the input field
    
    var commentContent = document.getElementById('comment-input').value;
    var commentAuthor = document.getElementById('comment-author').value;
    // You may want to perform additional validation here

    // Append the new comment to the comments body
    var commentsBody = document.getElementById('comments-body');
    var newComment = '<div class="card mb-2 card-sm"><div class="card-body"><h6 class="card-title">' + commentAuthor + '</h6><p class="card-text">' + commentContent + '</p></div></div>';
    commentsBody.innerHTML += newComment;

    // Clear the input field
    document.getElementById('comment-input').value = '';
}