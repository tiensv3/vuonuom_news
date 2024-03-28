<?php
error_reporting(0); // Turn off error reporting
ini_set('display_errors', 0); // Disable error display
// Thông tin kết nối đến MySQL
$host = "mysql_vuonuom_news";
$user = "mysql_vuonuom_news";
$password = "VUDN2024";
$database = "vuonuom_news";

// Tạo kết nối đến MySQL
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    // Redirect to 404 page
    header("HTTP/1.0 404 Not Found");
    include("404.html");
    exit();
}
// Thiết lập UTF-8 làm bộ ký tự mặc định
$conn->set_charset("utf8");
date_default_timezone_set('Asia/Bangkok');