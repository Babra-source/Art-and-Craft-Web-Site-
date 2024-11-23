$(document).ready(function() {
    // Show the comment section when the comment button is clicked
    $(".comment-button").on("click", function() {
        var artworkId = $(this).data("artwork-id");
        var commentSection = $("#comment-section-" + artworkId);
        commentSection.toggle(); // Toggle the visibility of the comment section
    });

    // Handle the comment submission
    $(".comment-submit").on("click", function() {
        var artworkId = $(this).data("artwork-id");
        var commentBox = $("#comment-section-" + artworkId).find(".comment-box");
        var commentText = commentBox.val();

        if (commentText.trim() !== "") {
            $.ajax({
                url: "../actions/comment_proc.php", // PHP file to handle comment posting
                type: "POST",
                data: {
                    artwork_id: artworkId,
                    comment: commentText
                },
                success: function(response) {
                    if (response.success) {
                        // Display the new comment below the post
                        var newComment = $("<p></p>").text(commentText);
                        $("#comments-list-" + artworkId).append(newComment);

                        // Update the comment count
                        var currentCommentCount = parseInt($("#comment-count-" + artworkId).text());
                        $("#comment-count-" + artworkId).text(currentCommentCount + 1);

                        // Clear the comment box
                        commentBox.val("");
                    } else {
                        alert("There was an error posting your comment. Please try again.");
                    }
                }
            });
        } else {
            alert("Please enter a comment before posting.");
        }
    });
});
