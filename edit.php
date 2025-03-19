<?php
include 'db_connect.php';
$MaSV = $_GET['MaSV'];
$sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $HoTen = $_POST["HoTen"];
    $GioiTinh = $_POST["GioiTinh"];
    $NgaySinh = $_POST["NgaySinh"];
    $Hinh = $_POST["Hinh"];
    $MaNganh = $_POST["MaNganh"];

    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="post">
    <label>Họ Tên:</label> <input type="text" name="HoTen" value="<?= $row['HoTen'] ?>" required><br>
    <label>Giới Tính:</label>
    <select name="GioiTinh">
        <option value="Nam" <?= $row['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $row['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select><br>
    <label>Ngày Sinh:</label> <input type="date" name="NgaySinh" value="<?= $row['NgaySinh'] ?>" required><br>
    <label>Hình Ảnh:</label> <input type="text" name="Hinh" value="<?= $row['Hinh'] ?>"><br>
    <label>Mã Ngành:</label> <input type="text" name="MaNganh" value="<?= $row['MaNganh'] ?>" required><br>
    <button type="submit">Cập Nhật</button>
</form>