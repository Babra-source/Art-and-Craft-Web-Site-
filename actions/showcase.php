<?php

include 'config.php';

$artworks = [
    [
        "id" => 1,
        "title" => "Ceramic Pot",
        "artist" => "Sandra Darko",
        "description" => "Beautifully handcrafted, this ceramic pot adds a touch of elegance to any space.",
        "rating" => 4,
        "image" => "art5.jpg"
    ],
    [
        "id" => 2,
        "title" => "Timeless Grace",
        "artist" => "Mensah Kevin",
        "description" => "Stunning portrait of a woman, capturing timeless beauty and emotion.",
        "rating" => 4,
        "image" => "art3.jpg"
    ]
    // Additional artworks...
];

// Fetch action from request
$action = $_GET['action'] ?? '';

// List all artworks
if ($action === 'read') {
    echo json_encode($artworks);
    exit;
}

// Create new artwork
if ($action === 'create') {
    $newArtwork = [
        "id" => count($artworks) + 1,
        "title" => $_POST['title'] ?? '',
        "artist" => $_POST['artist'] ?? '',
        "description" => $_POST['description'] ?? '',
        "rating" => (int)$_POST['rating'] ?? 0,
        "image" => $_POST['image'] ?? ''
    ];

    // Validate fields
    if (!$newArtwork['title'] || !$newArtwork['artist'] || !$newArtwork['image']) {
        echo json_encode(["status" => "error", "message" => "Title, Artist, and Image are required fields."]);
        exit;
    }

    $artworks[] = $newArtwork;
    echo json_encode(["status" => "success", "data" => $newArtwork]);
    exit;
}

// Update an artwork
if ($action === 'update') {
    $artworkId = (int)$_POST['id'];
    $foundIndex = array_search($artworkId, array_column($artworks, 'id'));

    if ($foundIndex !== false) {
        $artworks[$foundIndex]['title'] = $_POST['title'] ?? $artworks[$foundIndex]['title'];
        $artworks[$foundIndex]['artist'] = $_POST['artist'] ?? $artworks[$foundIndex]['artist'];
        $artworks[$foundIndex]['description'] = $_POST['description'] ?? $artworks[$foundIndex]['description'];
        $artworks[$foundIndex]['rating'] = (int)$_POST['rating'] ?? $artworks[$foundIndex]['rating'];
        $artworks[$foundIndex]['image'] = $_POST['image'] ?? $artworks[$foundIndex]['image'];

        echo json_encode(["status" => "success", "data" => $artworks[$foundIndex]]);
    } else {
        echo json_encode(["status" => "error", "message" => "Artwork not found."]);
    }
    exit;
}

// Delete an artwork
if ($action === 'delete') {
    $artworkId = (int)$_POST['id'];
    $foundIndex = array_search($artworkId, array_column($artworks, 'id'));

    if ($foundIndex !== false) {
        array_splice($artworks, $foundIndex, 1);
        echo json_encode(["status" => "success", "message" => "Artwork deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Artwork not found."]);
    }
    exit;
}

// Default action if no specific action is defined
echo json_encode(["status" => "error", "message" => "Invalid action specified."]);
?>