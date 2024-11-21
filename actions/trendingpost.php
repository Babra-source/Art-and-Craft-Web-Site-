<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/config.php';

// Fetch the top 4 most liked (or trending) posts based on the number of likes
$sql = "
    SELECT artwork.*, COUNT(likes.art_id) AS like_count
    FROM artwork
    LEFT JOIN likes ON artwork.art_id = likes.art_id
    GROUP BY artwork.art_id
    ORDER BY like_count DESC
    LIMIT 4"; // Get the top 4 posts with the most likes

$result = $conn->query($sql);

// Check if there are results
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display the post details
            echo '<div class="recent-post">';
            echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            echo '<div class="post-details">';
            echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
            echo '<p><strong>Likes:</strong> ' . $row['like_count'] . '</p>'; // Display the like count
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No posts available.";
    }
} else {
    die("Error executing query: " . $conn->error);
}

// Close the connection
$conn->close();
?>
