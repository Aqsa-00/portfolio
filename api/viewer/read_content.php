<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../config/db.php';
// Public - no login required
$result   = mysqli_query($conn, "SELECT content.id, content.title, content.description, users.username, content.created_at FROM content JOIN users ON content.user_id = users.id");
$contents = [];

while ($row = mysqli_fetch_assoc($result)) {
    $contents[] = $row;
}

echo json_encode($contents);
?>