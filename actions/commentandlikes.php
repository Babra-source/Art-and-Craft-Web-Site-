<?php


// Function to handle likes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'like') {
        $artwork_id = $_POST['artwork_id'];
        $sql = "SELECT like_count FROM likes WHERE artwork_id = $artwork_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $like_count = $row['like_count'] + 1;  // Increment the like count
            $update_sql = "UPDATE likes SET like_count = $like_count WHERE artwork_id = $artwork_id";
            $conn->query($update_sql);
        } else {
            // If no likes exist for this artwork, create a new record
            $conn->query("INSERT INTO likes (artwork_id, like_count) VALUES ($artwork_id, 1)");
        }
        echo $like_count; // Return the updated like count
    }

    // Function to handle comments
    if ($_POST['action'] === 'comment') {
        $artwork_id = $_POST['artwork_id'];
        $comment_text = $_POST['comment_text'];
        $stmt = $conn->prepare("INSERT INTO comments (artwork_id, comment_text) VALUES (?, ?)");
        $stmt->bind_param("is", $artwork_id, $comment_text);
        $stmt->execute();
        $stmt->close();
        echo "Comment added successfully"; // You can send a confirmation message
    }
}

$conn->close();
?>
