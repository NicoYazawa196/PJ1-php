<div class="heading">
	<span class="heading-label">Sửa thông tin tài khoản</span>
</div>

<?php 
session_start();
error_reporting (E_ERROR | E_WARNING | E_PARSE);
header('Content-Type: text/html; charset=UTF-8');
require_once("config.php"); 
if ( !$_SESSION['user_id'] )
{ 
	header('location:/index.php');
}
else
{ 
	$user_id = intval($_SESSION['user_id']);
	$sql_query = @mysql_query("SELECT * FROM khachhang WHERE ma_khachhang='{$user_id}'");
	$khachhang = @mysql_fetch_array( $sql_query ); 
		
	if ($_GET['do']=="sua") {
		$taikhoan = addslashes( $_POST['taikhoan'] );
		$matkhau = md5( addslashes( $_POST['matkhau'] ) );
		$hoten = addslashes( $_POST['hoten'] );
		$email = addslashes( $_POST['email'] );
		$diachi = addslashes( $_POST['diachi'] );
		$sdt = addslashes( $_POST['sdt'] );
		$ngaysinh = addslashes( $_POST['ngaysinh'] );
		$sql="
		UPDATE `khachhang` SET
		`email` = '".$email."',
		`diachi` = '".$diachi."',
		`sdt` = '".$sdt."',
		`hoten` = '".$hoten."',
		`ngaysinh` = '".$ngaysinh."' WHERE `ma_khachhang` =$user_id LIMIT 1 ;";
		
		
		if ($sua=mysql_query($sql))
		{	echo "<script>alert('Sửa thành công')</script>";
			echo "<script>window.location='/index.php'</script>";
		}
			
		else{
			echo "<script>alert('Sửa không thành công')</script>";
			echo "<script>window.location='javascript:history.go(-1)'</script>";
		}
			
			
		if ($_POST['pass']!="") {
			$sqlx="UPDATE `khachhang` SET `matkhau` = '".$pass."' WHERE `ma_khachhang` = '$user_id' LIMIT 1 ;";
			$suapass=mysql_query($sqlx);
			if ($suapass) 
				echo "(Đã đổi pass) ";
			else
				echo "(Chưa đổi pass) ";
		}
	}
	else
	echo"
	<form class='sign-form' method='POST' action='page/suathongtin.php?do=sua'>        
        <label class='sign-label'>Họ Và Tên:</label>
		<input class='sign-input' type='text' value='{$khachhang['hoten']}' name='hoten'/>
        <br>

        <label class='sign-label'>Số Điện Thoại:</label>
		<input class='sign-input' type='tel' value='{$khachhang['sdt']}' name='sdt'/>
		<br>

		<label class='sign-label'>Email:</label>
		<input class='sign-input' type='email' value='{$khachhang['email']}' name='email' />
        <br>

        <label class='sign-label'>Địa chỉ:</label>
		<input class='sign-input' type='text' value='{$khachhang['diachi']}' name='diachi' />
        <br>
		
        <label class='sign-label'>Ngày sinh:</label>
		<input value='{$khachhang['ngaysinh']}' class='sign-input' name='sn' type='text' />
        <br>
		
		<label class='sign-label'>Mật khẩu</label>
		<input class='sign-input' type='password' name='pass'/><br />

		<input class='sign-sua' type='submit' value='Sửa'>
		<input class='sign-sua' type='reset' value='Khôi phục' name='B2'>
	</form>
		";
} 
?>