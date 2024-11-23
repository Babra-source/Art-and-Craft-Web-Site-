// assets/js/interaction.js
document.addEventListener('DOMContentLoaded', function() {
    // Handle likes
    document.querySelectorAll('.love-button').forEach(button => {
        button.addEventListener('click', function() {
            const artworkId = this.closest('.artwork-card').dataset.artworkId;
            const likeCount = this.querySelector('#like-count');
            const icon = this.querySelector('i');

            fetch('../actions/handle_like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `artwork_id=${artworkId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    if (data.error === 'User not logged in') {
                        alert('Please log in to like artworks');
                        return;
                    }
                    alert(data.error);
                    return;
                }
                
                likeCount.textContent = data.likes;
                if (data.action === 'liked') {
                    icon.classList.add('liked');
                } else {
                    icon.classList.remove('liked');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Handle comments
    document.querySelectorAll('.comment-button').forEach(button => {
        button.addEventListener('click', function() {
            const artworkId = this.dataset.artworkId;
            const commentSection = document.querySelector(`#comment-section-${artworkId}`);
            
            if (commentSection.style.display === 'none') {
                // Load existing comments
                loadComments(artworkId);
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        });
    });

    // Handle comment submission
    document.querySelectorAll('.comment-submit').forEach(button => {
        button.addEventListener('click', function() {
            const artworkId = this.dataset.artworkId;
            const commentBox = this.previousElementSibling;
            const commentText = commentBox.value.trim();
            
            if (!commentText) return;

            fetch('../actions/handle_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `artwork_id=${artworkId}&comment_text=${encodeURIComponent(commentText)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    if (data.error === 'User not logged in') {
                        alert('Please log in to comment');
                        return;
                    }
                    alert(data.error);
                    return;
                }
                
                // Add new comment to the list
                addCommentToList(artworkId, data.comment);
                commentBox.value = ''; // Clear comment box
                
                // Update comment count
                const countElement = document.querySelector(`#comment-count-${artworkId}`);
                countElement.textContent = parseInt(countElement.textContent) + 1;
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

function loadComments(artworkId) {
    fetch(`../actions/handle_comment.php?artwork_id=${artworkId}`)
        .then(response => response.json())
        .then(data => {
            const commentsList = document.querySelector(`#comments-list-${artworkId}`);
            commentsList.innerHTML = ''; // Clear existing comments
            
            data.comments.forEach(comment => {
                addCommentToList(artworkId, comment);
            });
        })
        .catch(error => console.error('Error:', error));
}

function addCommentToList(artworkId, comment) {
    const commentsList = document.querySelector(`#comments-list-${artworkId}`);
    const commentElement = document.createElement('div');
    commentElement.classList.add('comment');
    commentElement.innerHTML = `
        <strong>${comment.user_name}</strong>
        <span class="comment-date">${new Date(comment.created_at).toLocaleDateString()}</span>
        <p>${comment.comment_text}</p>
    `;
    commentsList.insertBefore(commentElement, commentsList.firstChild);
}