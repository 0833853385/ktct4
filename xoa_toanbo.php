<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION["MaSV"])) {
    header("Location: login.php");
    exit();
}

$MaSV = $_SESSION["MaSV"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xóa toàn bộ học phần đã đăng ký của sinh viên
    $sql = "DELETE ChiTietDangKy FROM ChiTietDangKy
            JOIN DangKy ON ChiTietDangKy.MaDK = DangKy.MaDK
            WHERE DangKy.MaSV='$MaSV'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa toàn bộ học phần thành công!";
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
}

header("Location: hocphan_dadangky.php");
exit();
