<?php
session_start();
include '../db/config.php'; // Include your database connection

$user_id = $_SESSION['user_id']; // Assuming you have a session with the user ID
$artwork_id = $_POST['artwork_id']; // The artwork ID passed from the AJAX request

// Check if the user has already liked the artwork
$query = "SELECT like_status FROM user_likes WHERE user_id = ? AND artwork_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $artwork_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User has already interacted with the artwork
    $row = $result->fetch_assoc();
    $like_status = $row['like_status'];

    // Toggle the like count
    if ($like_status == 1) {
        // User liked the artwork, now un-like it
        $update_query = "UPDATE artwork SET likes_count = likes_count - 1 WHERE artwork_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("i", $artwork_id);
        $stmt->execute();

        // Update user_likes table to reflect un-liking
        $update_user_like = "UPDATE user_likes SET like_status = 0 WHERE user_id = ? AND artwork_id = ?";
        $stmt = $conn->prepare($update_user_like);
        $stmt->bind_param("ii", $user_id, $artwork_id);
        $stmt->execute();
    } else {
        // User has un-liked, now like it
        $update_query = "UPDATE artwork SET likes_count = likes_count + 1 WHERE artwork_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("i", $artwork_id);
        $stmt->execute();

        // Update user_likes table to reflect liking
        $update_user_like = "UPDATE user_likes SET like_status = 1 WHERE user_id = ? AND artwork_id = ?";
        $stmt = $conn->prepare($update_user_like);
        $stmt->bind_param("ii", $user_id, $artwork_id);
        $stmt->execute();
    }
} else {
    // If the user has not liked the artwork before, insert a new record
    $insert_like = "INSERT INTO user_likes (user_id, artwork_id, like_status) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($insert_like);
    $stmt->bind_param("ii", $user_id, $artwork_id);
    $stmt->execute();

    // Increment the like count in the artwork table
    $update_like_count = "UPDATE artwork SET likes_count = likes_count + 1 WHERE artwork_id = ?";
    $stmt = $conn->prepare($update_like_count);
    $stmt->bind_param("i", $artwork_id);
    $stmt->execute();
}

// Return the updated like count
$query = "SELECT likes_count FROM artwork WHERE artwork_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $artwork_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $row['likes_count'];
?>
