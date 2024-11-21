<?php
include 'db/config.php';

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    
    // SQL query to delete the user
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Redirect or provide feedback
    header("Location:view/dashboard.php"); // Redirect to the users list page after deletion
}
?>