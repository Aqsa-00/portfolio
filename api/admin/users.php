<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

requireRole('admin'); // only admin can access

$result = mysqli_query($conn, "SELECT id, username, email, role, is_active, last_login, created_at FROM users");
$users  = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);
?>