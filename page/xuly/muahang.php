<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
ob_start();
session_start();
require_once "config.php";
$email = $_POST['email'];
$ten = $_POST['hoten'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$yc = $_POST['yeucau'];
$ngaydathang = date("Y-m-d h:i:s");
$tonggia = $_SESSION['tongtien'];

$sqldh = "INSERT INTO donhang (ten_khachhang, email, diachi, so_dienthoai,yeucau,ngaydat, trangthai, tongtien) VALUE('{$ten}','{$email}','{$diachi}','{$sdt}','{$yc}','{$ngaydathang}','moi','{$tonggia}')";


mysql_query($sqldh) or die("Loi them don hang");

//chen tiep vao chi tiet don hang
$sqlmadh = "SELECT * FROM donhang WHERE email='$email' ORDER BY ma_donhang DESC LIMIT 0,1";
$resultmadh = mysql_query($sqlmadh);
while ($row = mysql_fetch_array($resultmadh)) {
    $madh = $row['ma_donhang'];
}
//them vao ctdh
foreach ($_SESSION['card'] as $key => $value) {
    $soluong = $value['soluong'];
    $gia = $value['price'];
    $sqldh = "INSERT INTO chitietdonhang(ma_donhang, masach, soluong, gia) VALUE ('{$madh}','{$key}','{$soluong}','{$gia}')";
    mysql_query($sqldh) or die("loi them chi tiet don hang");
}
echo "<script>alert('Bạn đã đặt hàng thành công')</script>";
//huy gio hang
unset($_SESSION['card']);
echo "<script>window.location='/index.php'</script>";
?>