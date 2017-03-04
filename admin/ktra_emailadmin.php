<?php

require_once "ketnoidb.php";

if ($_POST['email']) {
    $email = $_POST['email'];
    $sql = "SELECT COUNT(Email) FROM admin WHERE Email = '{$email}'";
    $result = mysql_query($sql) or die('Loi CSDL');
    $rows = mysql_fetch_array($result);
    if ($rows[0] > 0) {
        if ($_POST['d'] == 1) {
            echo "<span style='color:#ff0000'>Email này đã tồn tại</span>";
        } else {
            echo "<span style='color:green'>Bạn có thể sử dụng email này</span>";
        }
    } else {
        if ($_POST['d'] == 1) {
            echo "<span style='color:green'>Bạn có thể sử dụng email này</span>";
        } else {
            echo "<span style='color:#ff0000'>Email này đã tồn tại</span>";
        }
    }
}
?>
