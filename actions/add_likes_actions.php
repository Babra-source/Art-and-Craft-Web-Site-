<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Assuming you've already established a connection to the database
include('../db/config.php'); // Replace with your actual DB connection code

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the artwork ID from the form data (from the button's data attribute)
    $artwork_id = $_POST['artwork_id'];

    // Assuming user is logged in, and you have access to their user_id (e.g., from a session)
    session_start();
    $user_id = $_SESSION['user_id'];  // This assumes you are storing user_id in the session

    // Check if the user has already liked the artwork
    $check_like_query = "SELECT * FROM likes WHERE user_id = ? AND artwork_id = ?";
    $check_stmt = $conn->prepare($check_like_query);
    $check_stmt->bind_param("ii", $user_id, $artwork_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    // If the user has already liked the artwork, remove the like and decrease the like count
    if ($result->num_rows > 0) {
        // User has already liked, so remove the like
        $delete_like_query = "DELETE FROM likes WHERE user_id = ? AND artwork_id = ?";
        $delete_stmt = $conn->prepare($delete_like_query);
        $delete_stmt->bind_param("ii", $user_id, $artwork_id);
        $delete_stmt->execute();

        // Decrease the artwork's like count
        $update_like_query = "UPDATE artwork SET likes_count = likes_count - 1 WHERE artwork_id = ?";
        $update_stmt = $conn->prepare($update_like_query);
        $update_stmt->bind_param("i", $artwork_id);
        $update_stmt->execute();

        // Check if the delete and update were successful
        if ($delete_stmt->affected_rows > 0 && $update_stmt->affected_rows > 0) {
            header('Location: ../view/reels.php');
        } else {
            echo "Error removing your like.";
        }

        $delete_stmt->close();
        $update_stmt->close();
    } else {
        // User has not liked the artwork, so add the like
        // Insert the like record
        $insert_like_query = "INSERT INTO likes (user_id, artwork_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_like_query);
        $insert_stmt->bind_param("ii", $user_id, $artwork_id);
        $insert_stmt->execute();

        // Increase the artwork's like count
        $update_like_query = "UPDATE artwork SET likes_count = likes_count + 1 WHERE artwork_id = ?";
        $update_stmt = $conn->prepare($update_like_query);
        $update_stmt->bind_param("i", $artwork_id);
        $update_stmt->execute();

        // Check if the insert and update were successful
        if ($insert_stmt->affected_rows > 0 && $update_stmt->affected_rows > 0) {
            header('Location: ../view/reels.php');
        } else {
            echo "Error updating like count.";
        }

        $insert_stmt->close();
        $update_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
