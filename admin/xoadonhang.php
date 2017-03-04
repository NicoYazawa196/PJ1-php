<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
    <?php
    require_once "ketnoidb.php";
    ob_start();
    $madh = $_GET['madh'];
    $tt = $_GET['tt'];

    $sqlctdh = "DELETE FROM chitietdonhang WHERE ma_donhang='$madh'";
    mysql_query($sqlctdh) or die("Loi chua xoa xong ctdh theo madh");

    $sqlxoadh = "DELETE FROM donhang WHERE ma_donhang='$madh' AND trangthai='$tt'";
    $result = mysql_query($sqlxoadh) or die("Loi chua xoa duoc don hang");
    if ($result) {
        echo "<script>alert('Xóa đơn hàng thành công')</script>";
        echo "<script>window.location='index.php?page=qldh&tt={$tt}'</script>";
    }
    ?>
</body>
