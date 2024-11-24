<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if required POST data is provided
    if (isset($_POST['artwork_id'], $_POST['comment_text'], $_POST['user_id'])) {
        $artwork_id = $_POST['artwork_id'];
        $comment_text = $_POST['comment_text'];
        $user_id = $_POST['user_id']; // Assuming user_id is from the session, validate that it's a valid ID

        // Sanitize the input to prevent SQL injection
        $comment_text = trim($comment_text);
        if (empty($comment_text)) {
            echo "Comment cannot be empty.";
            exit;
        }

        // Prepare the SQL statement using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO group_comments (artwork_id, user_id, comment_text) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $artwork_id, $user_id, $comment_text); // "i" for integer, "s" for string

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Fetch and display the updated comment list
            $comment_sql = "SELECT * FROM group_comments WHERE artwork_id = ? ORDER BY created_at DESC";
            $stmt = $conn->prepare($comment_sql);
            $stmt->bind_param("i", $artwork_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p>" . htmlspecialchars($row['comment_text']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No comments yet.</p>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Missing required data.";
    }
}
?>
