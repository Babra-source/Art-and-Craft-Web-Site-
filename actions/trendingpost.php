<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/config.php';

// Fetch the top 3 artworks with the most likes
$sql = "
    SELECT artwork.artwork_id, artwork.title, artwork.description, artwork.image_path, COUNT(likes.artwork_id) AS total_likes
    FROM likes
    INNER JOIN artwork ON likes.artwork_id = artwork.artwork_id
    GROUP BY likes.artwork_id
    ORDER BY total_likes DESC
    LIMIT 3
";

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
            echo '<p><strong>Likes:</strong> ' . htmlspecialchars($row['total_likes']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No popular posts available.";
    }
} else {
    die("Error executing query: " . $conn->error);
}

// Close the connection
$conn->close();
?>
