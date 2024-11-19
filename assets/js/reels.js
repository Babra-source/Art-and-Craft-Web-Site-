

// document.addEventListener('DOMContentLoaded', () => {
//     // Like Button Functionality
//     const likeButtons = document.querySelectorAll('.like-button');
//     likeButtons.forEach(button => {
//         button.addEventListener('click', () => {
//             const isLiked = button.classList.toggle('liked');
//             button.style.color = isLiked ? '#ed4956' : '#262626';
//         });
//     });





    
//     // Comment Submission
//     const commentForms = document.querySelectorAll('.comments-section form');
//     commentForms.forEach(form => {
//         form.addEventListener('submit', event => {
//             event.preventDefault(); // Prevent form submission
//             const commentInput = form.querySelector('#comment-input');
//             const commentText = commentInput.value.trim();

//             if (commentText) {
//                 const commentList = form.nextElementSibling;
//                 const newComment = document.createElement('div');
//                 newComment.classList.add('comment');
//                 newComment.innerHTML = `<strong>You:</strong> ${commentText}`;
//                 commentList.appendChild(newComment);

//                 commentInput.value = ''; // Clear the input
//             }
//         });
//     });
// });




// Increment likes on click
function incrementLikes(button) {
    const likeCount = button.querySelector('.like-count');
    let count = parseInt(likeCount.textContent);
    count++;
    likeCount.textContent = count;
}

// Automatically sort recent posts (most recent first)
document.addEventListener('DOMContentLoaded', () => {
    const recentPosts = document.querySelector('.recent-posts');
    const posts = Array.from(recentPosts.querySelectorAll('.post'));
    posts.reverse(); // Assuming posts are appended in chronological order
    recentPosts.innerHTML = '<h3>Recent Posts</h3>';
    posts.forEach(post => recentPosts.appendChild(post));
});
