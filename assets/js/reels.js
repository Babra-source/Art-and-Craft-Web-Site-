
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
