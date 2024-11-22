// actions/handle_comment.php
<?php
header('Content-Type: application/json');
include '../db/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    $artwork_id = $_POST['artwork_id'] ?? null;
    $comment_text = $_POST['comment_text'] ?? null;
    
    if (!$artwork_id || !$comment_text) {
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }
    
    // Insert new comment
    $sql = "INSERT INTO comments (user_id, artwork_id, comment_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $artwork_id, $comment_text);
    
    if ($stmt->execute()) {
        // Get user details for the response
        $user_sql = "SELECT fname, lname FROM users WHERE user_id = ?";
        $user_stmt = $conn->prepare($user_sql);
        $user_stmt->bind_param("i", $user_id);
        $user_stmt->execute();
        $user_result = $user_stmt->get_result();
        $user = $user_result->fetch_assoc();
        
        echo json_encode([
            'success' => true,
            'comment' => [
                'id' => $stmt->insert_id,
                'user_name' => $user['fname'] . ' ' . $user['lname'],
                'comment_text' => $comment_text,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    } else {
        echo json_encode(['error' => 'Failed to add comment']);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle fetching comments for an artwork
    $artwork_id = $_GET['artwork_id'] ?? null;
    
    if (!$artwork_id) {
        echo json_encode(['error' => 'Artwork ID is required']);
        exit;
    }
    
    $sql = "SELECT c.*, u.fname, u.lname 
            FROM comments c 
            JOIN users u ON c.user_id = u.user_id 
            WHERE c.artwork_id = ? 
            ORDER BY c.created_at DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $artwork_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = [
            'id' => $row['id'],
            'user_name' => $row['fname'] . ' ' . $row['lname'],
            'comment_text' => $row['comment_text'],
            'created_at' => $row['created_at']
        ];
    }
    
    echo json_encode(['comments' => $comments]);
}