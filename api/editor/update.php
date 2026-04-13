<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

// Only admin and editor can access
requireRole('admin', 'editor');

$data        = json_decode(file_get_contents("php://input"), true);
$content_id  = intval($data['id'] ?? 0);
$title       = trim($data['title'] ?? '');
$description = trim($data['description'] ?? '');
$user_id     = $_SESSION['user_id'];
$role        = $_SESSION['role'];

// Validate
if (empty($content_id) || empty($title)) {
    http_response_code(400);
    echo json_encode(["error" => "Content ID and title are required"]);
    exit;
}

// Check content exists
$check = mysqli_prepare($conn, "SELECT user_id FROM content WHERE id = ?");
mysqli_stmt_bind_param($check, "i", $content_id);
mysqli_stmt_execute($check);
$result  = mysqli_stmt_get_result($check);
$content = mysqli_fetch_assoc($result);

if (!$content) {
    http_response_code(404);
    echo json_encode(["error" => "Content not found"]);
    exit;
}

// Editor can only update their OWN content
// Admin can update anyone's content
if ($role !== 'admin' && $content['user_id'] !== $user_id) {
    http_response_code(403);
    echo json_encode(["error" => "You can only update your own content"]);
    exit;
}

// Update the content
$stmt = mysqli_prepare($conn, 
    "UPDATE content SET title = ?, description = ? WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "ssi", $title, $description, $content_id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Content updated successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Failed to update content"]);
}
?>