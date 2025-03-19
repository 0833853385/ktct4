<?php
include 'db_connect.php';
$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Sinh Viên</title>
</head>

<body>
    <h2>Danh sách Sinh Viên</h2>
    <a href="create.php">Thêm Sinh Viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình Ảnh</th>
            <th>Mã Ngành</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["MaSV"] ?></td>
                <td><?= $row["HoTen"] ?></td>
                <td><?= $row["GioiTinh"] ?></td>
                <td><?= $row["NgaySinh"] ?></td>
                <td><img src="<?= $row["Hinh"] ?>" width="50"></td>
                <td><?= $row["MaNganh"] ?></td>
                <td>
                    <a href="edit.php?MaSV=<?= $row["MaSV"] ?>">Sửa</a> |
                    <a href="delete.php?MaSV=<?= $row["MaSV"] ?>">Xóa</a> |
                    <a href="detail.php?MaSV=<?= $row["MaSV"] ?>">Chi tiết</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>