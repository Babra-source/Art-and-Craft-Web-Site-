<?php
// Include the database configuration to establish the connection
include '../db/config.php';

// Function to handle likes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'like') {
        // Sanitize the input to avoid SQL injection
        $artwork_id = (int)$_POST['artwork_id'];

        // Prepare the SQL statement to prevent SQL injection
        $sql = "SELECT like_count FROM likes WHERE artwork_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $artwork_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $like_count = $row['like_count'] + 1;  // Increment the like count
            
            // Update the like count using a prepared statement
            $update_sql = "UPDATE likes SET like_count = ? WHERE artwork_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ii", $like_count, $artwork_id);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // If no likes exist for this artwork, create a new record
            $insert_sql = "INSERT INTO likes (artwork_id, like_count) VALUES (?, 1)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("i", $artwork_id);
            $insert_stmt->execute();
            $insert_stmt->close();
        }

        // Return the updated like count
        echo $like_count;
    }

    // Function to handle comments
    if ($_POST['action'] === 'comment') {
        // Sanitize the input to avoid SQL injection
        $artwork_id = (int)$_POST['artwork_id'];
        $comment_text = trim($_POST['comment_text']);

        // Check if comment text is empty
        if (!empty($comment_text)) {
            // Prepare the SQL statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO group_comments (artwork_id, comment_text) VALUES (?, ?)");
            $stmt->bind_param("is", $artwork_id, $comment_text);
            $stmt->execute();
            $stmt->close();

            echo "Comment added successfully"; // You can send a confirmation message
        } else {
            echo "Please enter a comment"; // Handle empty comment case
        }
    }
}

$conn->close();
?>
