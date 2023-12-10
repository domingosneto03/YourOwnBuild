function submitComment(taskId, userName) {
    var commentContent = $('#comment-input-' + taskId).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/comments/task/" + taskId,
        type: 'POST',
        data: {
            content: commentContent
        },
        success: function (response) {
            // Update the comments section with the new comment
            var commentsBody = $('#comments-body-' + taskId);
            var newComment = '<div class="card mb-2 card-sm"><div class="card-body"><h6 class="card-title">' + userName + ':</h6><p class="card-text">' + commentContent + '</p></div></div>';
            commentsBody.append(newComment);

            // Clear the input field
            $('#comment-input-' + taskId).val('');
        },
        error: function (error) {
            console.log(error);
        }
    });
}
