<?php
// Prevent mysqli from throwing exceptions
mysqli_report(MYSQLI_REPORT_OFF);

$host     = "127.0.0.1";
$port     = 3307; // Found in my.ini
$db_name  = "portfolio_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $db_name, $port);

if (!$conn) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}
?>
