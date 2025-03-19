<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION["MaSV"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["MaHP"])) {
    $MaHP = $_GET["MaHP"];
    $MaSV = $_SESSION["MaSV"];

    // Xóa học phần từ ChiTietDangKy
    $sql = "DELETE ChiTietDangKy FROM ChiTietDangKy
            JOIN DangKy ON ChiTietDangKy.MaDK = DangKy.MaDK
            WHERE ChiTietDangKy.MaHP='$MaHP' AND DangKy.MaSV='$MaSV'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa học phần thành công!";
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
}

header("Location: hocphan_dadangky.php");
exit();
