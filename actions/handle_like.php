// actions/handle_like.php
<?php
header('Content-Type: application/json');
include '../db/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user is logged in and get user ID from session
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    $artwork_id = $_POST['artwork_id'] ?? null;
    
    if (!$artwork_id) {
        echo json_encode(['error' => 'Artwork ID is required']);
        exit;
    }
    
    // Check if user has already liked this artwork
    $check_sql = "SELECT like_id FROM likes WHERE user_id = ? AND artwork_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $user_id, $artwork_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        // User has already liked, so unlike
        $delete_sql = "DELETE FROM likes WHERE user_id = ? AND artwork_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("ii", $user_id, $artwork_id);
        $success = $delete_stmt->execute();
        $action = 'unliked';
    } else {
        // User hasn't liked, so add like
        $insert_sql = "INSERT INTO likes (user_id, artwork_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $user_id, $artwork_id);
        $success = $insert_stmt->execute();
        $action = 'liked';
    }
    
    // Get updated like count
    $count_sql = "SELECT COUNT(*) as count FROM likes WHERE artwork_id = ?";
    $count_stmt = $conn->prepare($count_sql);
    $count_stmt->bind_param("i", $artwork_id);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $count = $count_result->fetch_assoc()['count'];
    
    echo json_encode([
        'success' => $success,
        'action' => $action,
        'likes' => $count
    ]);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}