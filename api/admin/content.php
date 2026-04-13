<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

// Only admin can access this
requireRole('admin');

// Get all content with the username of who created it
$result = mysqli_query($conn, 
    "SELECT content.id, content.title, content.description, 
            users.username, users.email, content.created_at 
     FROM content 
     JOIN users ON content.user_id = users.id
     ORDER BY content.created_at DESC"
);

$contents = [];

while ($row = mysqli_fetch_assoc($result)) {
    $contents[] = $row;
}

echo json_encode($contents);
?>