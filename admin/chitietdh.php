<?php
if (isset($_GET['madh']))
    $madh = $_GET['madh'];
?>
<div class="contenner">
    <div class="titleql">Chi tiết đơn hàng</div>
    <table class="table">
        <tr class="table_header">
            <th width="200" class="xuoc">Hình ảnh</th>
            <th width="250" class="xuoc">Họ và tên</th>
            <th width="100" class="xuoc">Số lượng</th>
            <th width="250" class="xuoc">Tổng giá sản phẩm</th>
        </tr>
        <?php
		error_reporting (E_ERROR | E_WARNING | E_PARSE);
        $sql = "SELECT * FROM chitietdonhang JOIN sach ON(chitietdonhang.masach=sach.masach) WHERE ma_donhang='$madh'";
        $result = mysql_query($sql) or die("Loi xem chi tiet don hang");
        while ($rows = mysql_fetch_array($result)) {
            ?>
            <tr class="table_content">
                <td class="xuoc"><div style="width: 199px;font-size: 14px;"><img style="width: 195px;font-size: 14px;" src="../<?php echo $rows['hinhanh'] ?>"></div></td>
                <td class="xuoc"><div style="width: 250px;font-size: 14px;"><?php echo $rows['tensach'] ?></div></td>
                <td class="xuoc"><div style="width: 100px;font-size: 14px;"><?php echo $rows['soluong'] ?></div></td>
                <td class="xuoc"><div style="width: 250px;font-size: 14px;"><?php echo number_format($rows['soluong'] * $rows['gia']). " vnđ"?></div></td>
            </tr>
            <?php
            $tonggia = $tonggia + $rows['soluong'] * $rows['gia'];
        }
        ?>
        <tr>
            <td><div style="height: 30px; font-size: 25px;color: red;text-transform: uppercase;font-weight: bold;float: right;F">Tổng giá đơn hàng : <?php echo number_format($tonggia) ." vnđ"?></div></td>
        </tr>
		
    </table>
</div>            