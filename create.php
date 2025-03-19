<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];
    $HoTen = $_POST["HoTen"];
    $GioiTinh = $_POST["GioiTinh"];
    $NgaySinh = $_POST["NgaySinh"];
    $Hinh = $_POST["Hinh"];
    $MaNganh = $_POST["MaNganh"];

    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh)
            VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$Hinh', '$MaNganh')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="post">
    <label>Mã SV:</label> <input type="text" name="MaSV" required><br>
    <label>Họ Tên:</label> <input type="text" name="HoTen" required><br>
    <label>Giới Tính:</label>
    <select name="GioiTinh">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
    </select><br>
    <label>Ngày Sinh:</label> <input type="date" name="NgaySinh" required><br>
    <label>Hình Ảnh:</label> <input type="text" name="Hinh"><br>
    <label>Mã Ngành:</label> <input type="text" name="MaNganh" required><br>
    <button type="submit">Thêm</button>
</form>