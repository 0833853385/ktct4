<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];

    // Kiểm tra xem MSSV có tồn tại trong CSDL không
    $sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["MaSV"] = $MaSV;
        header("Location: hocphan.php"); // Chuyển hướng đến trang học phần
        exit();
    } else {
        echo "Tài khoản không tồn tại!";
    }
}
