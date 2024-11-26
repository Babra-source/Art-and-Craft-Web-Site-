<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Start the session
session_start();

// Include the database configuration file
include '../db/config.php';

// Initialize a response array
$response = ['success' => false, 'message' => '', 'comment_text' => '', 'fname' => '', 'created_at' => ''];

// Check if the form is submitted and the comment is not empty
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['comment'])) {
    // Collect the comment data
    $comment = trim($_POST['comment']);
    $art = $_POST['artwork'];

    // Check if the user is logged in by verifying the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Retrieve user ID from the session

        // Retrieve the username for display
        $stmt_user = $conn->prepare("SELECT fname FROM group_users WHERE user_id = ?");
        $stmt_user->bind_param("i", $user_id);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $user = $result_user->fetch_assoc();
            $username = $user['fname'];
            $response['fname'] = $username;
        } else {
            $response['message'] = "User not found.";
            echo json_encode($response);
            exit();
        }
        $stmt_user->close();

        // Prepare an SQL statement to insert the comment into the database
        $stmt = $conn->prepare("INSERT INTO group_comments (user_id, comment_text, artwork) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $user_id, $comment, $art);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch the created_at timestamp of the newly inserted comment
            $last_id = $stmt->insert_id;
            $stmt_get_comment = $conn->prepare("SELECT created_at FROM group_comments WHERE id = ?");
            $stmt_get_comment->bind_param("i", $last_id);
            $stmt_get_comment->execute();
            $result_comment = $stmt_get_comment->get_result();

            if ($row = $result_comment->fetch_assoc()) {
                $response['created_at'] = $row['created_at'];
            }
            $stmt_get_comment->close();

            // Successfully added the comment
            $response['success'] = true;
            $response['comment_text'] = $comment; // Include the comment text in the response
        } else {
            $response['message'] = "Error posting comment.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $response['message'] = "User not logged in.";
    }
} else {
    $response['message'] = "Please enter a comment.";
}

// Close the database connection
$conn->close();

// Return JSON response
echo json_encode($response);
