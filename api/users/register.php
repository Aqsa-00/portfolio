<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once __DIR__ . '/../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

$data     = json_decode(file_get_contents("php://input"), true);
$username = trim($data['username'] ?? '');
$email    = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');
$role     = $data['role'] ?? 'viewer';

if (empty($username) || empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(["error" => "All fields are required"]);
    exit;
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    http_response_code(409);
    echo json_encode(["error" => "Email already registered"]);
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $role);

if (mysqli_stmt_execute($stmt)) {
    http_response_code(201);
    echo json_encode(["message" => "User registered successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Registration failed"]);
}
?>