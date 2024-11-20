<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if user is logged in
    session_start(); // Start the session to access the user_id
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Get user_id from the session
    } else {
        echo "You must be logged in to upload artwork.";
        exit; // Exit if user is not logged in
    }

    // Collect form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Handle file upload
    $artwork = $_FILES['artwork'];
    $artworkName = $artwork['name'];
    $artworkTmpName = $artwork['tmp_name'];
    $artworkError = $artwork['error'];
    $artworkSize = $artwork['size'];

    // Check if there were any file upload errors
    if ($artworkError === 0) {
        // Specify the directory to store the uploaded file
        $uploadDir = '../assets/uploads';
        $artworkPath = $uploadDir . basename($artworkName);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($artworkTmpName, $artworkPath)) {
            // Prepare SQL query with user_id
            $sql = "INSERT INTO artwork (title, description, art_type, image_path, artist_id) 
                    VALUES ('$name', '$description', '$category', '$artworkPath', '$user_id')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                header('Location: ../view/reels.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close connection
            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error in file upload.";
    }
}
?>
