<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION["MaSV"])) {
    header("Location: login.php");
    exit();
}

$MaSV = $_SESSION["MaSV"];
$sql = "SELECT HP.MaHP, HP.TenHP, HP.SoTinChi 
        FROM ChiTietDangKy CTDK
        JOIN DangKy DK ON CTDK.MaDK = DK.MaDK
        JOIN HocPhan HP ON CTDK.MaHP = HP.MaHP
        WHERE DK.MaSV = '$MaSV'";
$result = $conn->query($sql);
?>

<h2>Học phần đã đăng ký</h2>
<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên học phần</th>
        <th>Số tín chỉ</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["MaHP"] ?></td>
            <td><?= $row["TenHP"] ?></td>
            <td><?= $row["SoTinChi"] ?></td>
        </tr>
    <?php } ?>
</table>

<a href="hocphan_dangky.php">Quay lại đăng ký</a>