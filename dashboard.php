<?php
session_start(); // Start the session to access session variables
include 'db/config.php';

// Retrieve the user's name from session, default to 'Guest' if not set
$userName = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : 'Guest';
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

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arts and Crafts Hub - Dashboard</title>
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
  <header class="dashboard-header">
    <div class="dashboard-header-content">
      <a href="index.html" class="dashboard-logo">
        <img src="logo-removebg-preview (1).png" alt="Arts and Crafts Hub Logo">
      </a>
      <nav>
        <ul class="dashboard-nav-list">
          <li><a href="showcase.html">Showcase</a></li>
          <li><a href="connect.html">Connect</a></li>
          <li><a href="contacts.html">Contacts</a></li>
          <li><a href="login.php">Logout</a></li>
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

      <section class="dashboard-activities">
        <h2>Recent Activities</h2>
        <ul class="activity-list">
          <li>
            <span class="activity-icon"><i class="fas fa-shopping-bag"></i></span>
            <div class="activity-details">
              <h3>New Order Received</h3>
              <p>Order #123456 - Ceramic Pot</p>
              <p class="activity-timestamp">2 hours ago</p>
            </div>
          </li>
          <li>
            <span class="activity-icon"><i class="fas fa-comment"></i></span>
            <div class="activity-details">
              <h3>New Message from Customer</h3>
              <p>Feedback on "Timeless Grace" painting</p>
              <p class="activity-timestamp">1 day ago</p>
            </div>
          </li>
          <li>
            <span class="activity-icon"><i class="fas fa-palette"></i></span>
            <div class="activity-details">
              <h3>New Product Added</h3>
              <p>Handmade Woven Basket</p>
              <p class="activity-timestamp">3 days ago</p>
            </div>
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
        <?php 
        // Fetch the number of posts made by the user
        $userPostsQuery = "SELECT COUNT(artwork_id) FROM artwork WHERE artist_id = '$user_id'"; 
        $userPostsResult = $conn->query($userPostsQuery);
        $userPosts = $userPostsResult->fetch_row()[0];
      ?>
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
if ($conn) {
    $conn->close();
}
?>