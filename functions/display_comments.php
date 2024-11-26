<?php
// Include database connection
include('../db/config.php');

// Function to fetch top 5 comments
function getTopComments($artworkId) {
    global $conn;

    // SQL query to fetch top 5 comments for the artwork ID
    $sql = "SELECT group_comments.*, group_users.fname 
    FROM group_comments
    JOIN group_users ON group_users.user_id = group_comments.user_id
    WHERE group_comments.artwork = ?
    ORDER BY group_comments.created_at DESC
    LIMIT 5;";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $artworkId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all comments
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    return $comments;
}

// Check if artwork ID is passed
if (isset($_GET['artwork_id'])) {
    $artworkId = $_GET['artwork_id'];
    $comments = getTopComments($artworkId);

    // Return comments as JSON
    echo json_encode($comments);
} else {
    echo json_encode([]);
}
?>
