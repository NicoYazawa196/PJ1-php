<div class="heading">
	<span class="heading-label">Đặt hàng</span>
</div>
<?php
if (!isset($_SESSION["user_id"])) {
    echo "<script>alert('Bạn phải đăng nhập mới mua được hàng')</script>";
	echo "<script>window.location='index.php?page=dangnhap'</script>";
	exit;
} else {
// lấy thông tin khách hàng
    $sql = "SELECT * FROM khachhang WHERE ma_khachhang='" . $_SESSION["user_id"] . "'";
    $result = mysql_query($sql) or die("loi cu phap lay du lieu thanh vien");
    $row = mysql_fetch_array($result);
}
?>
<div class="gopY">
    <div class="info">
        <p class="canh-bao">*Xin vui lòng điền chính xác thông tin cá nhân của bạn. 
            Chúng tôi sẽ xác nhận thông tin của bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
        </p><br/>
        <div>
            <form action="page/xuly/muahang.php" method="post" class="sign-form">
				<label class="label-muahang">Email: </label>
                <input class="input-muahang" name="email" value="<?php echo $row['email'] ?>" type="email" tabindex="3">
                
				<label class="label-muahang">Họ tên:</label>
				<input class="input-muahang" name="hoten" placeholder="Họ và tên của bạn" value="<?php echo $row['hoten'] ?>" required="" tabindex="1" type="text">
                
				<label class="label-muahang">Địa chỉ: </label>
				<input class="input-muahang" name="diachi" placeholder="Địa chỉ của bạn" value="<?php echo $row['diachi'] ?>" required="" tabindex="2" type="text">
 
                 <label class="label-muahang">Số điện thoại:</label>
                 <input class="input-muahang" name="sdt" placeholder="Số điện thoại" value="<?php echo $row['sdt'] ?>" required="" type="text" tabindex="4">
              
                 <label class="label-muahang">Yêu cầu khác : </label></div>
                 <textarea class="input-yeucau" name="yeucau" tabindex="6" rows="10" cols="50"></textarea>
             
                 <input type="submit" name="Submit" class="submit-muahang" value="Thanh toán"/>
            </form>
        </div>
    </div>
</div>