<?php
session_start();
include '../db/config.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle Like/Unlike AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'like') {
    $artwork_id = $_POST['artwork_id'];

    // Check existing like
    $checkLike = $conn->prepare("SELECT * FROM likes WHERE artwork_id = ? AND user_id = ?");
    $checkLike->bind_param("ii", $artwork_id, $user_id);
    $checkLike->execute();
    $existingLike = $checkLike->get_result()->fetch_assoc();

    if ($existingLike) {
        // Remove like
        $deleteLike = $conn->prepare("DELETE FROM likes WHERE artwork_id = ? AND user_id = ?");
        $deleteLike->bind_param("ii", $artwork_id, $user_id);
        $deleteLike->execute();
        $action = 'unlike';
    } else {
        // Add like
        $addLike = $conn->prepare("INSERT INTO likes (artwork_id, user_id) VALUES (?, ?)");
        $addLike->bind_param("ii", $artwork_id, $user_id);
        $addLike->execute();
        $action = 'like';
    }

    // Get updated like count
    $likeCount = $conn->prepare("SELECT COUNT(*) as total_likes FROM likes WHERE artwork_id = ?");
    $likeCount->bind_param("i", $artwork_id);
    $likeCount->execute();
    $result = $likeCount->get_result()->fetch_assoc();

    echo json_encode([
        'success' => true, 
        'action' => $action, 
        'total_likes' => $result['total_likes']
    ]);
    exit();
}

// Fetch Artwork Query
$query = "SELECT 
    a.artwork_id, 
    a.name, 
    a.artwork_path, 
    a.description, 
    a.category, 
    a.created_at,
    COUNT(l.like_id) as total_likes,
    EXISTS(SELECT 1 FROM likes WHERE artwork_id = a.artwork_id AND user_id = ?) as user_liked
FROM 
    artwork a
LEFT JOIN 
    likes l ON a.artwork_id = l.artwork_id
GROUP BY 
    a.artwork_id
ORDER BY 
    a.created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Crafts | Art Reel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Your existing reels.css styles would go here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .container {
            display: flex;
            width: 100%;
        }
        .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .artwork-reels {
            flex-grow: 1;
            padding: 20px;
        }
        .artwork-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .artwork-post {
            border: 1px solid #ddd;
            width: 300px;
        }
        .artwork-post img {
            max-width: 100%;
            height: auto;
        }
        .like-btn {
            background: none;
            border: none;
            cursor: pointer;
        }
        .like-btn.liked i {
            color: red;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <a href="../index.html">Home</a>
                <a href="../view/showcase.php">Showcase</a>
                <a href="#" id="uploadLink">Upload Artwork</a>
                <a href="../view/contacts.php">Contact</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="artwork-reels">
            <div class="artwork-container">
                <?php while($artwork = $result->fetch_assoc()): ?>
                    <div class="artwork-post">
                        <img src="<?= htmlspecialchars($artwork['artwork_path']) ?>" alt="Artwork">
                        <div class="post-details">
                            <h3><?= htmlspecialchars($artwork['name']) ?></h3>
                            <p><?= htmlspecialchars($artwork['description']) ?></p>
                            <button 
                                class="like-btn <?= $artwork['user_liked'] ? 'liked' : '' ?>" 
                                data-artwork-id="<?= $artwork['artwork_id'] ?>"
                            >
                                <i class="fas fa-heart"></i>
                                <span><?= $artwork['total_likes'] ?></span>
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form class="upload-form" action="../actions/artwork_upload.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="file" name="artwork" accept="image/*" required>
                <textarea name="description" placeholder="Artwork Description" required></textarea>
                <select name="category" required>
                    <option value="painting">Painting</option>
                    <option value="sculpture">Sculpture</option>
                    <option value="photography">Photography</option>
                    <option value="digital">Digital Art</option>
                </select>
                <button type="submit">Submit Artwork</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Like Button Functionality
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function() {
                const artworkId = this.getAttribute('data-artwork-id');
                const likeCount = this.querySelector('span');
                
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=like&artwork_id=${artworkId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        likeCount.textContent = data.total_likes;
                        this.classList.toggle('liked', data.action === 'like');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Modal Functionality
        const modal = document.getElementById("uploadModal");
        const uploadLink = document.getElementById("uploadLink");
        const closeBtn = document.querySelector(".close");

        uploadLink.onclick = () => modal.style.display = "block";
        closeBtn.onclick = () => modal.style.display = "none";
        window.onclick = (event) => {
            if (event.target == modal) modal.style.display = "none";
        };
    });
    </script>
</body>
</html>