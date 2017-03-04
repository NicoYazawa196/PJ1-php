<?php
if (isset($_GET['tt'])) {
    $tt = $_GET['tt'];
}
?>
<div class="contenner">
    <div class="titleql">Quản lý đơn hàng</div>
    <table class="table">
        <tr class="table_header">
            <th width="230" class="xuoc">Họ và tên</th>
            <th width="150" class="xuoc">SĐT</th>
            <th width="200" class="xuoc">Tổng giá</th>
            <th width="170" class="xuoc">Trạng thái</th>
            <th width="190" class="xuoc">Địa chỉ giao hàng</th>
            <th width="90" class="xuoc">Cập nhật</th>
            <th width="90" class="xuoc">Chi tiết</th>
            <th width="40" class="xuoc">Xóa</th>
        </tr>
        <?php
        $sql = "SELECT * FROM donhang WHERE trangthai='$tt'";
        $result = mysql_query($sql) or die("Loi lay du lieu cho hien thi don hang");
        while ($rows = mysql_fetch_array($result)) {
            ?>
            <form action="capnhatdonhang.php" method="get">
            <tr class="table_content">
                <td class="xuoc"><div style="width: 185px;height: auto;margin: 0;padding: 0;font-size: 14px;"><?php echo $rows['ten_khachhang'] ?></div></td>
                <td class="xuoc"><div style="width: 123px;height: auto;margin: 0;padding: 0;font-size: 14px;"><?php echo $rows['so_dienthoai'] ?></div></td>
                <td class="xuoc"><div style="width: 165px;height: auto;margin: 0;padding: 0;font-size: 14px;"><?php echo number_format($rows['tongtien']) . " vnđ"?></div></td>
                <input name="madh" type="hidden" value="<?php echo $rows['ma_donhang'] ?>"/>
                <td class="xuoc">
                    <select name="trangthai">
                        <option value="moi" <?php if ($tt == 'moi') echo "selected='selected'" ?>>Đơn hàng mới</option>
                        <option value="xacnhan" <?php if ($tt == 'xacnhan') echo "selected='selected'" ?>>Đã xác nhận</option>
                        <option value="huy" <?php if ($tt == 'huy') echo "selected='selected'" ?>>Hủy đơn hàng</option>
                    </select>
                </td>
                <td class="xuoc"><div style="width: 155px;height: auto;margin: 0;padding: 0;font-size: 14px;"><?php echo $rows['diachi'] ?></div></td>
                <td class="xuoc"><div style="width: 77px;height: auto;margin: 0;padding: 0;font-size: 14px;"><input name="capnhat" type="submit" value="Cập nhật"/></div></td>
                <td class="xuoc"><div  style="width: 76px;height: auto;margin: 0;padding: 0;font-size: 14px;"><a href="index.php?page=chitietdh&madh=<?php echo $rows['ma_donhang']?>">Chi tiết</a></div></td>
                <td class="xuoc"><div  style="width: 38px;height: auto;margin: 0;padding: 0;font-size: 14px;"><a title="Xóa đơn hàng" href="xoadonhang.php?tt=<?php echo $tt?>&madh=<?php echo $rows['ma_donhang']?>">X</a></div></td>
                </tr>
            </form>
        <?php }
        ?>
    </table>
</div>            