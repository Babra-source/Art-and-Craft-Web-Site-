document.querySelectorAll('.comment-button').forEach(button => {
    button.addEventListener('click', () => {
        const artworkId = button.getAttribute('data-artwork-id');
        const commentSection = document.getElementById(`comment-section-${artworkId}`);

        // Toggle the visibility of the comment section
        if (commentSection.style.display === 'none' || commentSection.style.display === '') {
            commentSection.style.display = 'block';

            // Find or create the comments list container
            let commentsList = commentSection.querySelector('.comments-list');
            if (!commentsList) {
                commentsList = document.createElement('div');
                commentsList.classList.add('comments-list');
                commentSection.appendChild(commentsList);
            }

            // Clear the comments list
            commentsList.innerHTML = '';

            // Fetch top 5 comments from the database
            fetch(`../functions/display_comments.php?artwork_id=${artworkId}`)
                .then(response => response.json())
                .then(comments => {
                    if (comments.length > 0) {
                        comments.forEach(comment => {
                            const commentDiv = document.createElement('div');
                            commentDiv.classList.add('comment');
                            commentDiv.innerHTML = `
                                <p><strong>${comment.fname}</strong> said:</p>
                                <p>${comment.comment_text}</p>
                                <p><small>${comment.created_at}</small></p>
                            `;
                            commentsList.appendChild(commentDiv);
                        });
                    } else {
                        commentsList.innerHTML = '<p>No comments available.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching comments:', error);
                    commentsList.innerHTML = '<p>Failed to load comments.</p>';
                });
        } else {
            commentSection.style.display = 'none';
        }
    });
});

       
       
       
    //    // Attach click event listener to the comment button
    //    document.querySelectorAll('.comment-button').forEach(button => {
    //     button.addEventListener('click', () => {
    //         const artworkId = button.getAttribute('data-artwork-id');
    //         const commentSection = document.getElementById(`comment-section-${artworkId}`);
            
    //         // Toggle the visibility of the comment section
    //         if (commentSection.style.display === 'none' || commentSection.style.display === '') {
    //             commentSection.style.display = 'block';


    //         } else {
    //             commentSection.style.display = 'none';
    //         }
    //     });
    // });
    // Attach event listener to all Post buttons
    document.querySelectorAll('.comment-submit').forEach(button => {
        button.addEventListener('click', () => {
            const artworkId = button.getAttribute('data-artwork-id');
            const commentBox = document.getElementById(`comment-box-${artworkId}`);
            const commentText = commentBox.value.trim(); // Get the comment text
    
            // Ensure the comment is not empty
            if (commentText === '') {
                alert('Comment cannot be empty!');
                return;
            }
    
            // Prepare data to send to the server
            const formData = new FormData();
            formData.append('artwork', artworkId);  
            formData.append('artwork_id', artworkId);
            formData.append('comment', commentText);
    
            // Send AJAX request to add_comment_action.php
            fetch('../actions/me_action.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Expect JSON response
            .then(data => {
                if (data.success) {
                    // Append the new comment to the comments list
                    const commentsList = document.getElementById(`comments-list-${artworkId}`);
                    const newComment = document.createElement('div');
                    newComment.classList.add('comment'); // Add the same class as existing comments
                    newComment.innerHTML = `
                        <p><strong>${data.fname}</strong> said:</p>
                        <p>${data.comment_text}</p>
                        <p><small>${data.created_at}</small></p>
                    `;
                    commentsList.appendChild(newComment);
    
                    // Update the comment count
                    const commentCount = document.getElementById(`comment-count-${artworkId}`);
                    commentCount.textContent = parseInt(commentCount.textContent) + 1; // Increment comment count
    
                    // Clear the textarea
                    commentBox.value = '';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error adding comment:', error);
                alert('Failed to add the comment. Please try again.');
            });
        });
    });
    