<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(isset($_SESSION['user_id'])){
header('location:/index.php');
}
require_once("config.php");
error_reporting (E_ERROR | E_WARNING | E_PARSE);
if ( $_GET['act'] == "do" )
{
	// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
	$taikhoan = addslashes( $_POST['username'] );
	$matkhau = md5( addslashes( $_POST['password'] ) );
	// Lấy thông tin của username đã nhập trong table members
	$sql_query = @mysql_query("SELECT ma_khachhang, taikhoan, matkhau FROM khachhang WHERE taikhoan='{$taikhoan}'");
	$khachhang = @mysql_fetch_array( $sql_query );
	// Nếu username này không tồn tại thì....
	if ( @mysql_num_rows( $sql_query ) <= 0 )
	{
		echo "<script>alert('Tên đăng nhập không tồn tại')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	// Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
	if ( $matkhau != $khachhang['matkhau'] )
	{
		echo "<script>alert('Mật khẩu bạn không đúng')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	// Khởi động phiên làm việc (session)
	$_SESSION['user_id'] = $khachhang['ma_khachhang'];
	// Thông báo đăng nhập thành công
	header('location:/index.php');
}
else
{
// Form đăng nhập
print <<<EOF
<div class="heading">
	<span class="heading-label">Đăng nhập</span>
</div>
	<form action="/page/dangnhap.php?act=do" method="post" class="sign-form"/>        
        <label class="sign-label">Tên đăng nhập:</label>
        <input class="sign-input" type="text" name="username" required/>
        <br>
        
        <label class="sign-label">Mật khẩu:</label>
        <input class="sign-input" type="password" name="password" required/>
        <br>
        
        <input class="sign-submit" type="submit" value="Đăng nhập"/>
	</form>
EOF;
}
?>