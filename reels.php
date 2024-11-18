<?php
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts - Crafts| Showcase</title>
    <link rel="stylesheet" href="assets/css/showcase.css">
</head>



<body>
    <script src="assets/js/showcase.js"></script>
    <header>
        <div class="logo">
            <a href="index.html"><img src="/assets/images/logo-removebg-preview (1).png" alt="Lilac Spoon Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="Homepage.html">Home</a></li>
                <!--<li><a href="showcase.html">Showcase</a></li>-->
                <li><a href="creatorshub.html">Creators Hub</a></li>
                <li><a href="connect.html">Connect</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>
        </nav>
    </header>


    <div class="sidebar">
        <a><img src="assets/images/home.png" alt="home"> Home</a>
        <a href="dashboard.php"><img src="assets/images/dashboard.png" alt="dashboard"> Dashboard</a>
        <a href="Post.php"><img src="assets/images/post.png" alt="dashboard"> Make Your Post</a>
        <a href="creatorshub.php"><img src="assets/images/reel.png" alt="Showcase"> Creator Hub</a>
        <a href="showcase.php"><img src="recipe.png" alt="Recipe icon"> Reel</a>
        <a href="contacts.html"><img src="assets/images/feedback.png" alt="About icon"> Contacts</a>
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
            <img src="assets/images/art1.jpg"  alt="Reel Image">
            </div>

            <!-- Interactive Section -->
            <div class="interactions">
                <!-- Like Button -->
                <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                <!-- Comment Section -->
                <div class="comments-section">
                    <h4>Comments</h4>
                    <!-- Comment Input -->
                    <form action="actions/comment_proc.php" method="POST">
                        <textarea id="comment-input"name = "comment" placeholder="Add a comment..."></textarea>
                        <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                    </form>

                    <!-- Comment List -->
                    <div id="comment-list">
                        <!-- Example comments -->
                        <div class="comment">
                            <strong>John Doe:</strong> Beautiful image!
                        </div>
                        <div class="comment">
                            <strong>Jane Smith:</strong> I absolutely love this!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Right Sidebar for Recent Posts -->
    <div class="right-sidebar">
        <div class="recent-posts">
            <h3>Recent Posts</h3>
            <div class="post">
                <img src="assets/images/art1.jpg" alt="Post Image">
                <p>Post description or title here</p>
            </div>
            <div class="post">
                <img src="assets/images/art2.jpg" alt="Post Image">
                <p>Post description or title here</p>
            </div>
            <!-- Add more posts here -->
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
