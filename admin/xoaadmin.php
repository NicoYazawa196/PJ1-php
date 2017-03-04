<?php

ob_start();
session_start();
require_once "ketnoidb.php";
$id = $_GET['id'];
$sql = "DELETE FROM admin WHERE ma_quantri='$id'";
$result = mysql_query($sql) or die("Loi csdl xoa admin");
header("location:index.php?page=qlqtv");
exit();
?>
