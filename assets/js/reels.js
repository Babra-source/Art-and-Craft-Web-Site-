

document.addEventListener('DOMContentLoaded', () => {
    // Like Button Functionality
    const likeButtons = document.querySelectorAll('.like-button');
    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const isLiked = button.classList.toggle('liked');
            button.style.color = isLiked ? '#ed4956' : '#262626';
        });
    });





    
    // Comment Submission
    const commentForms = document.querySelectorAll('.comments-section form');
    commentForms.forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault(); // Prevent form submission
            const commentInput = form.querySelector('#comment-input');
            const commentText = commentInput.value.trim();

            if (commentText) {
                const commentList = form.nextElementSibling;
                const newComment = document.createElement('div');
                newComment.classList.add('comment');
                newComment.innerHTML = `<strong>You:</strong> ${commentText}`;
                commentList.appendChild(newComment);

                commentInput.value = ''; // Clear the input
            }
        });
    });
});
