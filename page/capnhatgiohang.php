<?php
ob_start();
session_start();
foreach ($_SESSION['card'] as $key => $value) {
    $soluong = (int) $_GET[$key];
    if ($soluong > 0) {
        $_SESSION['card'][$key] = array(
            "name" => $value['name'],
            "price" => $value['price'],
            "img" => $value['img'],
            "soluong" => round($soluong, 0)
        );
    } else {
        echo "Bạn không được nhập giá trị âm";
    }
}
header("location:/index.php?page=giohang");
?>