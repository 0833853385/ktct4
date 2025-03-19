<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];
    $Password = $_POST["Password"];

    $sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($Password, $row["Password"])) {
            $_SESSION["MaSV"] = $MaSV;
            header("Location: hocphan.php");
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Tài khoản không tồn tại!";
    }
}
?>

<form method="post">
    <label>Mã SV:</label> <input type="text" name="MaSV" required><br>
    <label>Mật Khẩu:</label> <input type="password" name="Password" required><br>
    <button type="submit">Đăng Nhập</button>
</form>