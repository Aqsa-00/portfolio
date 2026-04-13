<?php
$host     = "sql100.infinityfree.com";
$db_name  = "if0_41606864_portfolio";
$username = "if0_41606864";
$password = "Xnays7mEUL";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}
?>