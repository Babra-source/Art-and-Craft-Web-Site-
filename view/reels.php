<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Crafts | Art Reel</title>
    <link rel="stylesheet" href="../assets/css/reels.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="container">
        <!-- Left Sidebar: Navigation -->
        <aside class="sidebar">
            <nav>
                <a href="index.html"><img src="../assets/images/home.png" alt="home"> Home</a>
                <hr>
                <a href="../view/showcase.php"><img src="../assets/images/.png" alt="home"> Showcase</a>
                <hr>
                <!-- Add link to trigger the modal -->
                <a href="#" id="uploadLink"><img src="../assets/images/post.png" alt="home"> Upload Artwork</a>
                <hr>
                <a href="About.php"><img src="../assets/images/feedback.png" alt="home"> Contact</a>
                <hr>
            </nav>
        </aside> <!-- Close the sidebar here -->

<!-- <<<<<<< HEAD -->

    <div class="sidebar">
        <a><img src="../assets/images/home.png" alt="home"> Home</a>
        <a href="../view/dashboard.php"><img src="../assets/images/dashboard.png" alt="dashboard"> Dashboard</a>
        <a href="../view/reels.php"><img src="../assets/images/post.png" alt="dashboard"> Make Your Post</a>
        <a href="../view/creatorshub.html"><img src="../assets/images/reel.png" alt="Showcase"> Creator Hub</a>
        <a href="../view/showcase.php"><img src="../assets/images/recipe.png" alt="Recipe icon"> Reel</a>
        <a href="../view/contacts.php"><img src="../assets/images/feedback.png" alt="About icon"> Contacts</a>
    </div>

    <!-- <form action="post_proc.php" method="POST" enctype="multipart/form-data">
    <label for="artTitle">Art Title</label>
    <input type="text" id="artTitle" name="artTitle" required><br>

    <label for="artDescription">Art Description</label>
    <textarea id="artDescription" name="artDescription" required></textarea><br>

    <label for="artImage">Art Image</label>
    <input type="file" id="artImage" name="artImage" accept="image/*" required><br>

    <button type="submit">Post Art</button>
    </form> -->


      <!-- Main Content -->
      <div class="content">
        <div class="reel-container">
            <!-- Reel Content -->
            <div class="reel">
            <img src="../assets/images/art1.jpg"  alt="Reel Image">
            <!-- Like Button -->
            
            </div>
            <button class="like-button">
                        <i class="fas fa-heart"></i>
            </button>

            <!-- Interactive Section -->
            <div class="interactions">
                

                <!-- Comment Section -->
                <div class="comments-section">
                    <h4>Comments</h4>
                    <!-- Comment Input -->
                    <form action="../actions/comment_proc.php" method="POST">
                        <textarea id="comment-input"name = "comment" placeholder="Add a comment..."></textarea>
                        <br>
                        <button class="post-button">Post comment</button>

                    </form>

                    <!-- Comment List -->
                    <div id="comment-list">
                        <!-- Example comments -->
                        <div class="comment">
                            <strong>Lizzy crimps:</strong> Beautiful image!
                        </div>
                        <div class="comment">
                            <strong>Amp_hopkin:</strong> I absolutely love this!
                        </div>

        <!-- Main Content: Reel -->
        <main class="main-content">
            <div class="reel-container">
                <article class="artwork-card">
                    <div class="image-container">
                        <img src="../assets/images/art2.jpg" alt="Timeless Grace">

                    </div>
                    <p class="art-description">
                        "Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature.
                    </p>
                    <div class="interaction-section">
                        <textarea placeholder="Add a comment..." class="comment-box"></textarea>
                        <button class="comment-submit">Post</button>
                    </div>
                </article>
            </div>
        </main>

        <!-- Right Sidebar: Recent Posts -->
        <aside class="right-bar">
            <h3>Recent Posts</h3>
            <div class="recent-post">
                <img src="../assets/images/art1.jpg" alt="Inspiring Nature">
                <div class="post-details">
                    <h4>Inspiring Nature</h4>
                    <p>A breathtaking view of nature's beauty.</p>
                </div>
            </div>
            <div class="recent-post">
                <img src="../assets/images/art2.jpg" alt="The Color of Joy">
                <div class="post-details">
                    <h4>The Color of Joy</h4>
                    <p>An artwork celebrating vibrant emotions.</p>
                </div>
            </div>
            <div class="recent-post">
                <img src="../assets/images/art3.jpg" alt="Art and Identity">
                <div class="post-details">
                    <h4>Art and Identity</h4>
                    <p>Exploring culture through expressive art.</p>
                </div>
            </div>
        </aside>
    </div> <!-- Close the container here -->

    <!-- Modal for Upload Artwork Form -->
    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Upload Your Artwork</h2>
            <form class="upload-form" action="#" method="POST">
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
                    <!-- Add more categories as needed -->
                </select>

                <button type="submit">Submit Artwork</button>
            </form>
        </div>
    </div>


    <script src=".../assets/js/reels.js"></script>

    <script>
        // Get the modal and the button that opens it
        var modal = document.getElementById("uploadModal");
        var btn = document.getElementById("uploadLink");
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the "Upload Artwork" link, open the modal
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
</html>
