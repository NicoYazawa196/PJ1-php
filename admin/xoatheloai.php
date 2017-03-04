<?php

require_once 'ketnoidb.php';
ob_start();
session_start();
if (isset($_GET['matheloai'])) {
    $matheloai = $_GET['matheloai'];
}
$sql = "DELETE FROM theloai WHERE matheloai='$matheloai'";
$result = mysql_query($sql) or die("Khong xoa duoc theloai");
if ($result) {
    echo "<script>alert('Xóa thể loại thành công')</script>";
	echo "<script>window.location='javascript:history.go(-1)'</script>";
}
?>