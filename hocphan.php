<?php
include 'db_connect.php';
$sql = "SELECT * FROM HocPhan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Học Phần</title>
</head>

<body>
    <h2>Danh sách Học Phần</h2>
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Đăng Ký</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["MaHP"] ?></td>
                <td><?= $row["TenHP"] ?></td>
                <td><?= $row["SoTinChi"] ?></td>
                <td>
                    <a href="dangkyhocphan.php?MaHP=<?= $row["MaHP"] ?>">Đăng ký</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>