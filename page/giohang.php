<div class="heading">
	<span class="heading-label">Giỏ hàng</span>
</div>

<?php
if (isset($_SESSION['card'])) {
    ?>
    <form action="page/capnhatgiohang.php" method="get">
        <div class="contentGiohang">
        <div class="giohang">
        	<div class="infoGiohang">
            	<table width="730" boder="1"  cellpadding="0" cellspacing="0">
                	<tr>
                    	<td class="tableGiohang">Hình Ảnh</td>
                        <td class="tableGiohang"><strong>Tên Sách</strong></td>
                        <td class="tableGiohang"><strong>Giá</strong></td>
                        <td class="tableGiohang"><strong>Số Lượng</strong></td>
                        <td class="tableGiohang"><strong>Thành Tiền</strong></td>   
                        <td class="tableGiohang"><strong>Xóa</strong></td> 
                     </tr>
                     
                     <?php
                        foreach ($_SESSION['card'] as $key => $value) {
                     ?>
                     <tr>
                       <td class="hinhanhsp"><img src="<?php echo $value["img"] ?>"/></td>
                       <td class="tensp"><?php echo $value["name"] ?></td>
                       <td class="giasp"><?php echo number_format($value["price"], 0) ?></td>	
                       <td class="soluongsp"><input type="number" min="1" max="99" name="<?php echo $key ?>" value="<?php echo $value["soluong"] ?>"/></td>
                       <td class="thanhtien"><?php echo number_format($value['price'] * $value['soluong']) .  " vnđ"?></td>
                       <td class="xoa"><a title="Xóa sản phẩm" href="page/xoasanphamgiohang.php?MaSP=<?php echo $key ?>">x</a></td>
                     </tr>
                     
                     <?php
                        }
//                    Tinh tong tien
                        $_SESSION["tongtien"] = 0;
                        foreach ($_SESSION['card'] as $key => $value) {
                            $_SESSION["tongtien"] = $_SESSION["tongtien"] + ($value["soluong"] * $value["price"]);
                        }
                        ?>
                        <tr>
                            <td><input class="update-cart" type="submit" name="Submit" value="Cập nhật giỏ hàng"/></td>
                            <td><strong class="tongtien">Tổng tiền: </strong></td>
                            <td colspan="2"><strong class="giatongtien"><?php echo number_format($_SESSION["tongtien"]) . " vnđ" ?></strong></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><span class="muatiep"><a href="/index.php">Tiếp tục mua hàng</a></span></td>
                            <td><span class="muahang"><a href="index.php?page=dathang">Mua hàng</a></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
    <?php
} else {
    echo "<span class='cart-echo'>Bạn chưa có sản phẩm</span>";
}
?>