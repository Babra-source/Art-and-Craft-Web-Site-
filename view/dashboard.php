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
</head>
<body>
  <header class="dashboard-header">
    <div class="dashboard-header-content">
      <a href="index.html" class="dashboard-logo">
        <img src="../assets/images/logo-removebg-preview (1).png" alt="Arts and Crafts Hub Logo">
      </a>
      <nav>
        <ul class="dashboard-nav-list">
        <li><a href="../view/reels.php">Artwork Reels</a></li>
          <li><a href="../view/showcase.php">Showcase</a></li>
          <li><a href="../view/connect.php">Connect</a></li>
          <li><a href="../view/contacts.php">Contacts</a></li>
          <?php if ($user_id == 1): ?>
              <li><a href="../view/user_management.php">User Management</a></li>
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
                $query = "SELECT title,art_type, created_at FROM artwork ORDER BY created_at DESC LIMIT 2";
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
          <span class="activity-icon"><i class="fas fa-palette"></i></span>
          <div class="activity-details">
            <h3>New Artwork Posted</h3>
            <p>Your "Timeless Grace" painting</p>
            <p class="activity-timestamp">2 hours ago</p>
          </div>
        </li>
        <li>
          <span class="activity-icon"><i class="fas fa-comment"></i></span>
          <div class="activity-details">
            <h3>New Comment on Artwork</h3>
            <p>Feedback on your artwork "Handmade Woven Basket"</p>
            <p class="activity-timestamp">1 day ago</p>
          </div>
        </li>
      </ul>
    </section>
  </main>
<?php endif; ?>

  <footer class="dashboard-footer">
    <p>&copy; 2023 The Arts and Crafts Hub. All rights reserved.</p>
  </footer>
</body>
</html>
<?


