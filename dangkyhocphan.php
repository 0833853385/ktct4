<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION["MaSV"])) {
    die("Vui lòng đăng nhập trước.");
}

$MaSV = $_SESSION["MaSV"];
$MaHP = $_GET["MaHP"];
$NgayDK = date("Y-m-d");

// Tạo mã đăng ký mới
$sql = "INSERT INTO DangKy (NgayDK, MaSV) VALUES ('$NgayDK', '$MaSV')";
if ($conn->query($sql) === TRUE) {
    $MaDK = $conn->insert_id;
    // Đăng ký chi tiết học phần
    $sql = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$MaHP')";
    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký học phần thành công!";
    } else {
        echo "Lỗi khi đăng ký: " . $conn->error;
    }
} else {
    echo "Lỗi khi tạo đăng ký: " . $conn->error;
}
?>
<br><a href="hocphan.php">Quay lại</a>