<?php
session_start();
ob_start();
$masp = $_GET["MaSP"];
unset($_SESSION['card'][$masp]);
header("location:../index.php?page=giohang");
?>