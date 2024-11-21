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


</head>


<body>
    
        <!-- Left Sidebar: Navigation -->
        <aside class="sidebar">
            <nav>
                <a href="../index.html"><img src="../assets/images/home.png" alt="home"> Home</a>
                <hr>
                <a href="../view/showcase.php"><img src="../assets/images/display.png" alt="Showcase"> Showcase</a>
                <hr>
                <!-- Add link to trigger the modal -->
                <a href="#" id="uploadLink"><img src="../assets/images/post.png" alt="home"> Upload Artwork</a>
                <hr>
                <a href="../view/contacts.php"><img src="../assets/images/feedback.png" alt="home"> Contact</a>
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
        ?>
                <article class="artwork-card">
                    <div class="image-container">
                        <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($title); ?>">
                    </div>
                    <p class="art-description">
                        <?php echo htmlspecialchars($description); ?>
                    </p>
                    <div class="interaction-section">
                        <button class="action-button love-button">
                            <i class="fas fa-heart"></i> Love
                        </button>
                        <button class="action-button like-button">
                            <i class="fas fa-thumbs-up"></i> Like
                        </button>
                        <textarea placeholder="Add a comment..." class="comment-box"></textarea>
                        <button class="comment-submit">Post</button>
                    </div>
                </article>
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



    <!-- Modal JavaScript -->
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