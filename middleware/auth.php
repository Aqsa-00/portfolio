<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireAuth() {
    if (!isLoggedIn()) {
        http_response_code(401);
        echo json_encode(["error" => "Unauthorized access. Please login."]);
        exit;
    }
}

function requireLogin() {
    requireAuth();
}

function requireRole(...$roles) {
    requireAuth();
    if (!in_array($_SESSION['role'], $roles)) {
        http_response_code(403);
        echo json_encode(["error" => "Forbidden: You do not have permission for this action."]);
        exit;
    }
}
?>
