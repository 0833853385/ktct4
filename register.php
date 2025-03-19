<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];
    $HoTen = $_POST["HoTen"];
    $Password = password_hash($_POST["Password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh, Password) 
            VALUES ('$MaSV', '$HoTen', '', '2000-01-01', '', '', '$Password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="post">
    <label>Mã SV:</label> <input type="text" name="MaSV" required><br>
    <label>Họ Tên:</label> <input type="text" name="HoTen" required><br>
    <label>Mật Khẩu:</label> <input type="password" name="Password" required><br>
    <button type="submit">Đăng Ký</button>
</form>