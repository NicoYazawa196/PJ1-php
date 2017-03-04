<?php

ob_start();
session_start();
require_once "ketnoidb.php";
$magopy = $_GET['magopy'];
$sqlxoagopy = "DELETE FROM phanhoi WHERE ma_phanhoi='$magopy'";
$result = mysql_query($sqlxoagopy) or die("Loi csdl xoa gop y");
header("location:index.php?page=qlgopy");
exit();
?>
