<?php

require_once 'ketnoidb.php';
ob_start();
session_start();
if (isset($_GET['tentheloai'])) {
    $ten = $_GET['tentheloai'];
}
$sql = "INSERT INTO theloai(tentheloai) VALUES('$ten')";
$result = mysql_query($sql) or die("Khong them duoc nsx");
if ($result) {
		echo "<script>alert('Thêm thể loại thành công')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
}
?>