<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
ob_start();
session_start();
require_once "ketnoidb.php";
if (isset($_GET['matv'])) {
    $maxoatv = $_GET['matv'];
}

$sqlxoatv = "DELETE FROM khachhang WHERE ma_khachhang='$maxoatv'";
if (mysql_query($sqlxoatv)) {
    echo "<script>alert('Xóa thành viên thành công')</script>";
    echo "<script>window.location='index.php?page=qltv'</script>";
} else {
    echo "<script>alert('Không xóa được thành viên')</script>";
    echo "<script>window.location='index.php?page=qltv'</script>";
}
?>