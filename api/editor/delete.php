<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

requireLogin();

$data       = json_decode(file_get_contents("php://input"), true);
$content_id = intval($data['id'] ?? 0);
$user_id    = $_SESSION['user_id'];
$role       = $_SESSION['role'];

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

// Only admin OR the owner can delete
if ($role !== 'admin' && $content['user_id'] !== $user_id) {
    http_response_code(403);
    echo json_encode(["error" => "You can only delete your own content"]);
    exit;
}

$stmt = mysqli_prepare($conn, "DELETE FROM content WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $content_id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Content deleted"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Delete failed"]);
}
?>