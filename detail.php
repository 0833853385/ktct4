<?php
include 'db_connect.php';
$MaSV = $_GET['MaSV'];
$sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Thông tin chi tiết</h2>
<p>Mã SV: <?= $row["MaSV"] ?></p>
<p>Họ Tên: <?= $row["HoTen"] ?></p>
<p>Giới Tính: <?= $row["GioiTinh"] ?></p>
<p>Ngày Sinh: <?= $row["NgaySinh"] ?></p>
<p>Hình Ảnh: <img src="<?= $row["Hinh"] ?>" width="100"></p>
<p>Mã Ngành: <?= $row["MaNganh"] ?></p>
<a href="index.php">Quay lại</a>