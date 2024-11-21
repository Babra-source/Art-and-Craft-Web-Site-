<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/config.php';

// Fetch the latest 3 posts
$sql = "SELECT * FROM artwork ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($sql);

// Check if there are results
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display the post details
            echo '<div class="recent-post">';
            echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            echo '<div class="post-details">';
            echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No recent posts available.";
    }
} else {
    die("Error executing query: " . $conn->error);
}

// Close the connection
$conn->close();
?>
