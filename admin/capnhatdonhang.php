<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
require_once 'ketnoidb.php';
$madh = $_GET['madh'];
$trangthai = $_GET['trangthai'];
$sql = "UPDATE donhang SET trangthai='$trangthai' WHERE ma_donhang='$madh'";
echo $sql;
$result = mysql_query($sql) or die("Loi chua update duoc trang thai dh");
if ($result) {
    echo "<script>alert('Cập nhật đơn hàng thành công!')</script>";
	echo "<script>window.location='/admin/index.php?page=qldh&tt={$trangthai}'</script>";
	
}
?>