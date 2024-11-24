<?php
session_start(); // Start the session to access session variables
include '../db/config.php';

// Retrieve the user's name from session, default to 'Guest' if not set
$userName = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'Guest';
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];
// Query for total number of customers based on unique user_id
$totalUsersQuery = "SELECT COUNT(user_id) FROM users";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_row()[0];

// Query for total number of artwork posts based on unique artwork_id
$totalArtworksQuery = "SELECT COUNT(artwork_id) FROM artwork";
$totalArtworksResult = $conn->query($totalArtworksQuery);
$totalArtworks = $totalArtworksResult->fetch_row()[0];

// Query for total number of contact messages based on unique message_id
$totalMessagesQuery = "SELECT COUNT(message_id) FROM contact_messages";
$totalMessagesResult = $conn->query($totalMessagesQuery);
$totalMessages = $totalMessagesResult->fetch_row()[0];


// Fetch the number of posts made by the user
$userPostsQuery = "SELECT COUNT(artwork_id) FROM artwork WHERE artist_id = '$user_id'"; 
$userPostsResult = $conn->query($userPostsQuery);
$userPosts = $userPostsResult->fetch_row()[0];


// Fetch recent artwork posts by the user
$recentArtworksQuery = "SELECT title, created_at FROM artwork WHERE artist_id = '$user_id' ORDER BY created_at DESC LIMIT 3";
$recentArtworksResult = $conn->query($recentArtworksQuery);


$query = "SELECT artwork_id, title, art_type, created_at FROM artwork WHERE artist_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($query);

// Improved delete action with prepared statement
if (isset($_GET['delete'])) {
  $artwork_id = $_GET['delete'];
  $deleteQuery = "DELETE FROM artwork WHERE artwork_id = ?";
  $stmt = $conn->prepare($deleteQuery);
  $stmt->bind_param("i", $artwork_id);
  $stmt->execute();
  header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page after deletion
  $stmt->close();
  
}


// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arts and Crafts Hub | Dashboard</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- Add this right before your closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <header class="dashboard-header">
    <div class="dashboard-header-content">
      <a href="../index.html" class="dashboard-logo">Arts and Crafts Hub</a>
      <nav>
        <ul class="dashboard-nav-list">
        <li><a href="../view/reels.php">Artwork Reels</a></li>
          <li><a href="../view/showcase.php">Showcase</a></li>
          <li><a href="../view/contacts.php">Contacts</a></li>
          
          <?php if ($user_id == 1): ?>
              <li><a href="../view/user_management.php">User Management</a></li>
              <!-- <a href="#" id="uploadLink"><img src="../assets/images/post.png" alt="home"> Upload Artwork</a> -->
          <?php endif; ?>

          <li><a href="../view/login.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <?php if ($role == 1): // Check if the user is an admin ?>
    <main class="dashboard-main">
      <section class="dashboard-welcome">
        <h1>Welcome, <?php echo ($userName); ?>!</h1> <!-- Display email instead of first name -->
        <p>Explore your dashboard and manage your account.</p>
      </section>

      <section class="dashboard-stats">
        <div class="stat-card">
          <i class="fas fa-users"></i>
          <h3>Total Customers</h3>
          <p><?php echo number_format($totalUsers); ?></p>
        </div>
        <div class="stat-card">
          <i class="fas fa-palette"></i>
          <h3>Number of Artwork Posts</h3>
          <p><?php echo number_format($totalArtworks); ?></p>
        </div>
        <div class="stat-card">
          <i class="fas fa-envelope"></i>
          <h3>Number of Contact Messages</h3>
          <p><?php echo number_format($totalMessages); ?></p>
        </div>
      </section>




          <li>
                <?php
                // Fetch the top two new contact messages from the database
                $query = "SELECT message_id,message_content, created_at FROM contact_messages ORDER BY created_at DESC LIMIT 2";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($message = $result->fetch_assoc()) {
                        // Set dynamic icon and title for message activity
                        $icon = 'fas fa-comment';
                        $activityTitle = 'New Message from Customer';
                        
                        // Calculate the timestamp using the time_ago function
                        $timeAgo = $message['created_at'];
                        
                        // Display the message activity
                        echo '<span class="activity-icon"><i class="fas fa-envelope"></i></span>';
                        echo '<div class="activity-details">';
                        echo '<h3>' . $activityTitle . '</h3>';
                        echo '<p>' . htmlspecialchars($message['message_content']) . '</p>'; // Use 'message' column instead of 'comment_text'
                        echo '<p class="activity-timestamp">' . $timeAgo . '</p>';
                        echo '</div>';
                        echo '<br>';
                        
                    }
                } else {
                    echo '<li>No new contact messages.</li>';
                }
                ?>
          </li>







          <li>
          <?php
                // Fetch the top two new contact messages from the database
                $query = "SELECT title,art_type, image_path, created_at FROM artwork ORDER BY created_at DESC LIMIT 2";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($message = $result->fetch_assoc()) {
                        // Set dynamic icon and title for message activity
                        $icon = 'fas fa-palette';
                        $activityTitle = 'New Posts';
                        
                        // Calculate the timestamp using the time_ago function
                        $timeAgo = $message['created_at'];
                        
                        // Display the message activity
                        echo '<span class="activity-icon"><i class="fas fa-palette"></i></span>';
                        echo '<div class="activity-details">';
                        echo '<h3>' . $activityTitle . '</h3>';
                        echo '<p>' . htmlspecialchars($message['title']) . '</p>'; // Use 'message' column instead of 'the title'
                        echo '<p>' . htmlspecialchars($message['art_type']) . '</p>'; // Use 'message' column instead of 'the title'

                        if (!empty($message['image_path'])) {
                          echo '<p>Image Path: ' . htmlspecialchars($message['image_path']) . '</p>';
                          echo '<img src="' . htmlspecialchars($message['image_path']) . '" alt="' . htmlspecialchars($message['title']) . '" style="width: 50px; height: auto; border-radius: 5px;">';
                      } else {
                          echo '<p>No image available for this post.</p>';
                      }

                        echo '<p class="activity-timestamp">' . $timeAgo . '</p>';
                        echo '</div>';
                        echo '<br>';
                        
                    }
                } else {
                    echo '<li>No new Post.</li>';
                }
                ?>
          </li>
        </ul>
      </section>


    </main>
  <?php endif; ?>
  <?php if ($role == 2): // Check if the user is a regular user/artisan ?>
  <main class="dashboard-main">
    <section class="dashboard-welcome">
      <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
      <p>Explore your dashboard and manage your posts.</p>
    </section>

    <section class="dashboard-stats">
      <div class="stat-card">
        <i class="fas fa-palette"></i>
        <h3>Your Artwork Posts</h3>
        <!-- Fetch the number of artwork posts for the current user -->

      <p><?php echo number_format($userPosts); ?> Posts</p>
      </div>
    </section>

    <section class="dashboard-activities">
      <h2>Your Recent Activities</h2>
      <ul class="activity-list">
        <li>

          <?php
                  // Assuming $user_id contains the logged-in user's ID
                  $user_id = $_SESSION['user_id']; // Example: Fetch from session or authentication logic

                  // Fetch the top two new artworks for the current user
                  $query = "SELECT title, art_type, created_at 
                            FROM artwork 
                            WHERE artist_id = ? 
                            ORDER BY created_at DESC 
                            LIMIT 2";

                  // Prepare the SQL statement
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("i", $user_id); // Bind the user ID parameter
                  $stmt->execute();
                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                      while ($message = $result->fetch_assoc()) {
                          // Set dynamic icon and title for artwork activity
                          $icon = 'fas fa-palette';
                          $activityTitle = 'New Posts';

                          // Fetch the creation timestamp
                          $timeAgo = $message['created_at'];

                          // Display the artwork activity
                          echo '<span class="activity-icon"><i class="fas fa-palette"></i></span>';
                          echo '<div class="activity-details">';
                          echo '<h3>' . $activityTitle . '</h3>';
                          echo '<p>' . htmlspecialchars($message['title']) . '</p>';
                          echo '<p>' . htmlspecialchars($message['art_type']) . '</p>';
                          echo '<p class="activity-timestamp">' . $timeAgo . '</p>';
                          echo '</div>';
                          echo '<br>';
                      }
                  } else {
                      echo '<li>No new Posts.</li>';
                  }

                  // Close the statement
                  $stmt->close();
                  ?>

        </li>
        <li>
        <?php

            $user_id = $_SESSION['user_id'];

            // Query to fetch the latest comments on the current user's artworks
            $query = "SELECT c.comment_text, a.title, c.created_at 
                      FROM comments c
                      JOIN artwork a ON c.user_id = a.artist_id
                      WHERE a.artist_id = ? 
                      ORDER BY c.created_at DESC 
                      LIMIT 2";

            // Prepare the SQL statement
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $user_id); // Bind the user ID parameter
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($comment = $result->fetch_assoc()) {
                    // Set the activity details dynamically
                    $activityTitle = 'New Comment on Artwork';
                    $feedback = htmlspecialchars($comment['comment_text']);
                    $artworkTitle = htmlspecialchars($comment['title']);
                    $timeAgo = $comment['created_at'];

                    // Display the activity
                    echo '<li>';
                    echo '<span class="activity-icon"><i class="fas fa-comment"></i></span>';
                    echo '<div class="activity-details">';
                    echo '<h3>' . $activityTitle . '</h3>';
                    echo '<p>Feedback on your artwork "' . $artworkTitle . '"</p>';
                    echo '<p class="activity-timestamp">' . $timeAgo . '</p>';
                    echo '</div>';
                    echo '</li>';
                }
            } else {
              echo '<span class="activity-icon"><i class="fas fa-comment"></i></span>';
              echo '<li>No new comments on your artworks.</li>';
            }

            // Close the statement
            $stmt->close();
            ?>

        </li>
      </ul>
    </section>
  </main>
  <section class="dashboard-artwork container mt-5">
  <h2 class="text-center mb-4">Your Artwork Posts</h2>
  
  <?php
  $query = "SELECT artwork_id, title, art_type,image_path, created_at FROM artwork WHERE artist_id = ? ORDER BY created_at DESC";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Art Type</th>
            <th scope="col">Image_path</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($post = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($post['title']); ?></td>
              <td><?php echo htmlspecialchars($post['art_type']); ?></td>
              <td>
                    <?php 
                    if (!empty($post['image_path'])) { 
                      echo '<img src="' . htmlspecialchars($post['image_path']) . '" alt="' . htmlspecialchars($post['title']) . '" style="width: 50px; height: auto; border-radius: 5px;">';
                    } else {
                      echo '<p>No image available for this post.</p>';
                    }
                    ?>
                  </td>
              <td><?php echo htmlspecialchars($post['created_at']); ?></td>
              <td class="text-center">
                <button 
                  class="btn btn-danger btn-sm" 
                  onclick="showDeleteModal(<?php echo $post['artwork_id']; ?>, '<?php echo htmlspecialchars($post['title']); ?>')"
                >
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php 
  } else {
    echo '<div class="alert alert-info text-center" role="alert">No artwork posts found.</div>';
  }
  $stmt->close();
  ?>
</section>

<script>
function showDeleteModal(artworkId, artworkTitle) {
    // Create modal HTML
    const modalHTML = `
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete the artwork "${artworkTitle}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="?delete=${artworkId}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Remove any existing modal
    const existingModal = document.getElementById('deleteModal');
    if (existingModal) {
        existingModal.remove();
    }

    // Add the new modal to the document
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Initialize and show the modal
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();

    // Clean up the modal when it's hidden
    document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function () {
        this.remove();
    });
}
</script>


</style>
<?php endif; ?>

  <footer class="dashboard-footer">
    <p>&copy; 2023 The Arts and Crafts Hub. All rights reserved.</p>
  </footer>
</body>
</html>
<?

