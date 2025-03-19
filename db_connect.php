<?php
$host = '127.0.0.1';
$dbname = "Test1";
$username = "root";
$password = "";
$port = 8000; // Nếu MySQL chạy trên cổng 8000, nếu không hãy để mặc định (3306)

// Kết nối database
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset UTF-8 để tránh lỗi font
$conn->set_charset("utf8mb4");

echo "Kết nối thành công!";
