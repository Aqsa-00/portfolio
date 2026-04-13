<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        http_response_code(401);
        echo json_encode(["error" => "Unauthorized. Please login."]);
        exit;
    }
}

function requireRole(...$roles) {
    requireLogin();
    if (!in_array($_SESSION['role'], $roles)) {
        http_response_code(403);
        echo json_encode(["error" => "Forbidden. You don't have permission."]);
        exit;
    }
}
?>