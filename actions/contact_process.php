<?php
include '../db/config.php';  // Include database configuration

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data and remove extra spaces
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $message = mysqli_real_escape_string($conn, trim($_POST['message']));

    // Check if fields are not empty after trimming
    if (!empty($name) && !empty($email) && !empty($message)) {
        // If you want to link the message to a user, you would need to get the user_id based on email.
        // Example: Assuming you have a users table, fetch the user_id based on the email.
        
        // Find the user_id based on the email
        $user_query = "SELECT user_id FROM group_users WHERE email = '$email'";
        $result = mysqli_query($conn, $user_query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $user_id = $user['user_id'];
        } else {
            // If user not found, you can set user_id to null or some default value
            $user_id = NULL;
        }

        // SQL query to insert the data into your database
        $sql = "INSERT INTO contact_messages (user_id, message_content, created_at) 
                VALUES ('$user_id', '$message', NOW())";
        
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Message submitted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>
