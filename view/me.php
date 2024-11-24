<?php
// Include the database configuration to establish the connection
include '../db/config.php';

// Fetch all artworks ordered by the most recent (created_at or similar)
$sql = "SELECT * FROM artwork ORDER BY created_at DESC"; // Order by 'created_at' to show the most recent first
$result = $conn->query($sql);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Crafts | Art Reel</title>
    <link rel="stylesheet" href="../assets/css/reels.css">
    <!-- <script src="../assets/js/interaction.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>


<body>
    
        <!-- Left Sidebar: Navigation -->
        <aside class="sidebar">
            <nav>
                <a href="../index.html"><img src="../assets/images/home.png" alt="home"> Home</a>
                <hr>
                <a href="../view/showcase.php"><img src="../assets/images/display.png" alt="Showcase"> Showcase</a>
                <hr>
                
                <a href="../view/dashboard.php"><img src="../assets/images/dashboard.png" alt="dashboard"> Dashboard</a>
                <hr>
                <!-- Add link to trigger the modal -->
                <a href="#" id="uploadLink"><img src="../assets/images/post.png" alt="home"> Upload Artwork</a>
                <hr>
                <a href="../view/contacts.php"><img src="../assets/images/feedback.png" alt="home"> Contact</a>
                <hr>
                <a href="../view/about_page.php"><img src="../assets/images/about.png" alt="about">About</a>
                <hr>
            </nav>
        </aside> <!-- Close the sidebar here -->


    


    <main class="main-content">
    <div class="reel-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $artwork_id = $row['artwork_id'];
                $title = $row['title'];
                $description = $row['description'];
                $image_path = $row['image_path'];


                // Fetch the number of likes for this artwork
                $like_sql = "SELECT COUNT(*) AS like_count FROM likes WHERE user_id = $artwork_id";
                $like_result = $conn->query($like_sql);
                $like_row = $like_result->fetch_assoc();
                $like_count = $like_row['like_count'];

                // Fetch the number of comments for this artwork
                $comment_sql = "SELECT COUNT(*) AS comment_count FROM comments WHERE artwork = $artwork_id";
                $comment_result = $conn->query($comment_sql);
                $comment_row = $comment_result->fetch_assoc();
                $comment_count = $comment_row['comment_count'];
        ?>
                <article class="artwork-card">
                    <div class="image-container">
                        <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($title); ?>">
                    </div>
                    <p class="art-description">
                     Description :   <?php echo htmlspecialchars($description); ?>
                    </p>
                    <hr style="border: 1px solid black;">
                    

                    <div class="action-container">
                        <!-- Love Button -->
                        <div class="button-row">
                        <button class="action-button love-button" id="like-button">
                            <i class="fa-solid fa-heart fa-2x"></i>
                            <span id="like-count"><?php echo $like_count; ?></span> Likes
                        </button>

                        
                        <button class="action-button comment-button" data-artwork-id="<?php echo $artwork_id; ?>">
                            <i class="fa-solid fa-comment fa-2x"></i>
                            <span id="comment-count-<?php echo $artwork_id; ?>"><?php echo $comment_count; ?></span> Comments
                        </button>

                        <!-- Hidden comment section (initially hidden) -->
                        <div class="comment-section" id="comment-section-<?php echo $artwork_id; ?>" style="display: none;">
                            <textarea placeholder="Add a comment..." class="comment-box" id="comment-box-<?php echo $artwork_id; ?>"></textarea>
                            <button class="comment-submit" data-artwork-id="<?php echo $artwork_id; ?>">Post</button>
                            <div class="comments-list" id="comments-list-<?php echo $artwork_id; ?>"></div> <!-- To display comments -->
                        </div>
                    </div>


                </article>

                <!-- <script src="../assets/js/comment.js"></script> -->
        <?php
            }
        } else {
            echo "<p>No artworks found.</p>";
        }

        $conn->close();
        ?>
    </div>
</main>
    


<!-- Right Sidebar: Recent Posts  -->
        <aside class="right-bar">
            <h3>Recent Posts</h3>
            <?php

            include('../actions/recentpost.php');
            ?>
            <hr>


            <h3>Trending Post</h3>

        </aside>


    <!-- Modal for Upload Artwork Form -->
    <div id="uploadModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Upload Your Artwork</h2>
                <form class="upload-form" action="../actions/artwork_upload.php" method="POST" enctype="multipart/form-data">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="artwork">Artwork Image:</label>
                    <input type="file" id="artwork" name="artwork" accept="image/*" required>

                    <label for="description">Artwork Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>

                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="painting">Painting</option>
                        <option value="sculpture">Sculpture</option>
                        <option value="photography">Photography</option>
                        <option value="digital">Digital Art</option>
                    </select>

                    <button type="submit">Submit Artwork</button>
                </form>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 
</script>



<script>

       // Attach click event listener to the comment button
    document.querySelectorAll('.comment-button').forEach(button => {
        button.addEventListener('click', () => {
            const artworkId = button.getAttribute('data-artwork-id');
            const commentSection = document.getElementById(`comment-section-${artworkId}`);
            
            // Toggle the visibility of the comment section
            if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        });
    });
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
                    newComment.textContent = data.comment_text; // Display the comment text
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

        });
    });
</script>
<script>



        // Get the modal and the button to open it
        var modal = document.getElementById("uploadModal");
        var btn = document.getElementById("uploadLink");
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


    </script>
</body>



</body>        





</html>
