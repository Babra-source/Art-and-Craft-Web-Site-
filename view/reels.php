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