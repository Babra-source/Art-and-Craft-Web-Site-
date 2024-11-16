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
        <a href="view/dashboard.php"><img src="assets/images/dashboard.png" alt="dashboard"> Dashboard</a>
        <a href="view/creatorshub.php"><img src="assets/images/" alt="Showcase"> Creator Hub</a>
        <a href="view/contacts"><img src="recipe.png" alt="Recipe icon"> Showcase reel</a>
        <a href="view/contacts.php"><img src="../assets/images/about.png" alt="About icon"> Contacts</a>
    </div>

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
                <button class="like-btn">❤️ <span id="like-count">20</span></button>

                <!-- Comment Section -->
                <div class="comments-section">
                    <h4>Comments</h4>
                    <!-- Comment Input -->
                    <textarea id="comment-input" placeholder="Add a comment..."></textarea>
                    <button class="add-comment-btn">Post</button>

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

    <script src="script.js"></script>
</body>
</html>
