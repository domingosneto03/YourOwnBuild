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

            // Append the delete button for the user's own comments
            var deleteButton = '<button class="btn btn-outline-danger btn-sm position-absolute top-0 end-0 m-2" onclick="deleteComment(' + response.id + ')">Delete</button>';

            var newComment = '<div class="card mb-2 card-sm position-relative"><div class="card-body"><h6 class="card-title">' + userName + ':</h6><p class="card-text">' + commentContent + '</p>' + deleteButton + '</div></div>';
            commentsBody.append(newComment);

            // Clear the input field
            $('#comment-input-' + taskId).val('');
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function deleteComment(commentId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/comments/" + commentId,
        type: 'DELETE',
        success: function () {
            // Remove the deleted comment from the UI
            $('#comment-' + commentId).remove();
        },
        error: function (error) {
            console.log(error);
        }
    });
}
