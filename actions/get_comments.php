<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../db/config.php';
    $artwork_id = $_POST['artwork_id'];
    $comment_sql = "SELECT * FROM group_comments WHERE artwork_id = '$artwork_id' ORDER BY created_at DESC";
    $result = $conn->query($comment_sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='comment'><p>" . htmlspecialchars($row['comment_text']) . "</p></div>";
        }
    } else {
        echo "<p>No comments yet.</p>";
    }

    $conn->close();
}


?>