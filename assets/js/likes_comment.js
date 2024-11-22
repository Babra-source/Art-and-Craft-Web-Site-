
    // Handle the like button click
    document.getElementById('love-button').addEventListener('click', function() {
        const artworkId = 1;  // Replace with the actual artwork ID
        const likeCountElement = document.getElementById('like-count');

        // Send a POST request to the PHP backend to increase the like count
        fetch('like_comment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=like&artwork_id=${artworkId}`
        })
        .then(response => response.text())
        .then(likeCount => {
            likeCountElement.textContent = likeCount;  // Update the like count
        })
        .catch(error => console.error('Error:', error));
    });

    document.querySelectorAll('.comment-button').forEach(function(button, index) {
        button.onclick = function() {
            var commentSection = button.closest('.artwork-card').querySelector('.comment-section');
            commentSection.style.display = commentSection.style.display === 'block' ? 'none' : 'block';
        }
    });
    
    // Handle the comment button click
    document.getElementById('comment-button').addEventListener('click', function() {
        const commentSection = document.getElementById('comment-section');
        commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none'; // Toggle visibility
    });

    // Handle posting a comment
    document.getElementById('post-comment').addEventListener('click', function() {
        const artworkId = 1;  // Replace with the actual artwork ID
        const commentText = document.querySelector('.comment-box').value;

        // Send the comment to the backend
        fetch('like_comment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=comment&artwork_id=${artworkId}&comment_text=${encodeURIComponent(commentText)}`
        })
        .then(response => response.text())
        .then(message => {
            console.log(message); // Display message (e.g., confirmation)
            document.getElementById('comment-count').textContent = parseInt(document.getElementById('comment-count').textContent) + 1;
            document.querySelector('.comment-box').value = '';  // Clear the comment box
            document.getElementById('comment-section').style.display = 'none'; // Hide the comment section
        })
        .catch(error => console.error('Error:', error));
    });
