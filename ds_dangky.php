<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION["MaSV"])) {
    die("Vui lòng đăng nhập trước.");
}

$MaSV = $_SESSION["MaSV"];
$sql = "SELECT HocPhan.MaHP, HocPhan.TenHP, HocPhan.SoTinChi, DangKy.NgayDK 
        FROM ChiTietDangKy 
        JOIN DangKy ON ChiTietDangKy.MaDK = DangKy.MaDK
        JOIN HocPhan ON ChiTietDangKy.MaHP = HocPhan.MaHP
        WHERE DangKy.MaSV = '$MaSV'";
$result = $conn->query($sql);
?>

<h2>Học phần đã đăng ký</h2>
<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th>Ngày Đăng Ký</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["MaHP"] ?></td>
            <td><?= $row["TenHP"] ?></td>
            <td><?= $row["SoTinChi"] ?></td>
            <td><?= $row["NgayDK"] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<a href="hocphan.php">Đăng ký thêm</a>