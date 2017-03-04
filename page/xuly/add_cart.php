<?php
$masp = $_GET["masach"];
$sql = "SELECT * FROM sach WHERE masach='$masp'";
$result = mysql_query($sql) or die("Loi cau lenh truy van trong gio hang theo masp");
while ($row = mysql_fetch_array($result)) {
    $img = $row["hinhanh"];
    $name = $row["tensach"];
    $price = $row["gia"];
}

//luu vao bien Session- neu chua ton tai thi luu moi
if (!isset($_SESSION['card'][$masp])) {
    $_SESSION['card'][$masp] = array("MaSP"=>$masp,"img" => $img, "name" => $name, "price" => $price, "soluong" => 1);
} else {
    foreach ($_SESSION['card'] as $key => $value) {
        if ($key == $masp) {
            $sl = $value["soluong"] + 1;
            $_SESSION['card'][$masp] = array("MaSP"=>$masp,"img" => $img, "name" => $name, "price" => $price, "soluong" => $sl);
        }
    }
}
header("location:index.php?page=giohang");
?>