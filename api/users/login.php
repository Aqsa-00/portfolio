<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

session_start();
require_once __DIR__ . '/../../middleware/auth.php';
require_once __DIR__ . '/../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

$data     = json_decode(file_get_contents("php://input"), true);
$email    = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');

if (empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(["error" => "Email and password are required"]);
    exit;
}

// Find user by email
$stmt = mysqli_prepare($conn, "SELECT id, username, password, role FROM users WHERE email = ? AND is_active = 1");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user   = mysqli_fetch_assoc($result);

// Verify password
if (!$user || !password_verify($password, $user['password'])) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}

// Update last login time
$update = mysqli_prepare($conn, "UPDATE users SET last_login = NOW() WHERE id = ?");
mysqli_stmt_bind_param($update, "i", $user['id']);
mysqli_stmt_execute($update);

// Save user info in session
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role']     = $user['role'];

echo json_encode([
    "message"  => "Login successful",
    "username" => $user['username'],
    "role"     => $user['role']
]);
?>