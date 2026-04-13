<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

requireRole('admin', 'editor');

$data        = json_decode(file_get_contents("php://input"), true);
$title       = trim($data['title'] ?? '');
$description = trim($data['description'] ?? '');
$user_id     = $_SESSION['user_id'];

if (empty($title)) {
    http_response_code(400);
    echo json_encode(["error" => "Title is required"]);
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO content (user_id, title, description) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iss", $user_id, $title, $description);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Content created successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Failed to create content"]);
}
?>