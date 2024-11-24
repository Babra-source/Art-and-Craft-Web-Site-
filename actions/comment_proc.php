<?php
// Start the session at the beginning of the script
session_start();

// Include the database configuration file to connect to the database
include '../db/config.php';

// Check if the form is submitted and the comment is not empty
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['comment'])) {
    // Collect the comment data
    $comment = trim($_POST['comment']);
    
    // Check if the user is logged in by verifying the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Retrieve user ID from the session
        
        // Prepare an SQL statement to insert the comment into the database
        $stmt = $conn->prepare("INSERT INTO group_comments (user_id, comment_text) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $comment); // Bind the user_id and comment

        // Execute the query
        if ($stmt->execute()) {
            // Successfully added the comment, redirect to the showcase page
            header('Location: ../view/showcase.php'); // Replace with the correct page
            exit();
        } else {
            // Failed to post the comment, show an error message
            echo "Error posting comment.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "User not logged in.";
    }
} else {
    echo "Please enter a comment.";
}

// Close the database connection
$conn->close();
?>
