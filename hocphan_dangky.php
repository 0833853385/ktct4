<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION["MaSV"])) {
    header("Location: login.php");
    exit();
}

$MaSV = $_SESSION["MaSV"];

// Xử lý đăng ký học phần
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["hocphan"])) {
        // Tạo bản ghi mới trong bảng DangKy
        $sqlInsertDangKy = "INSERT INTO DangKy (NgayDK, MaSV) VALUES (NOW(), '$MaSV')";
        if ($conn->query($sqlInsertDangKy) === TRUE) {
            $MaDK = $conn->insert_id; // Lấy mã đăng ký mới

            // Lưu từng học phần vào ChiTietDangKy
            foreach ($_POST["hocphan"] as $MaHP) {
                $sqlInsertChiTiet = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$MaHP')";
                $conn->query($sqlInsertChiTiet);
            }

            echo "<script>alert('Đăng ký học phần thành công!');</script>";
        } else {
            echo "<script>alert('Lỗi đăng ký học phần!');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng chọn ít nhất một học phần!');</script>";
    }
}

// Lấy danh sách học phần
$sqlHocPhan = "SELECT * FROM HocPhan";
$resultHocPhan = $conn->query($sqlHocPhan);
?>

<h2>Đăng ký học phần</h2>
<form method="post">
    <?php while ($row = $resultHocPhan->fetch_assoc()) { ?>
        <input type="checkbox" name="hocphan[]" value="<?= $row['MaHP'] ?>">
        <?= $row['TenHP'] ?> - <?= $row['SoTinChi'] ?> tín chỉ <br>
    <?php } ?>
    <button type="submit">Lưu đăng ký</button>
</form>

<a href="hocphan_dadangky.php">Xem học phần đã đăng ký</a>