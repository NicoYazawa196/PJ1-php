<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
require_once("config.php");
//Kiem tra email co hop le hay ko
function check_email($email) {
	if (strlen($email) == 0) return false;
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
	return false;
}
error_reporting (E_ERROR | E_WARNING | E_PARSE);
if ( $_GET['act'] == "do" )
{
	// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
	$taikhoan = addslashes( $_POST['username'] );
	$matkhau = md5( addslashes( $_POST['password'] ) );
	$verify_matkhau = md5( addslashes( $_POST['verify_password'] ) );
	$email = addslashes( $_POST['email'] );
	$hoten = addslashes( $_POST['fullname'] );
	$ngaysinh = addslashes( $_POST['birthday'] );
	$diachi = addslashes( $_POST['address'] );
	$sdt = addslashes( $_POST['tel'] );
	$check = "/^(09|012|04)[0-9]{8}$/";
	if ( ! $taikhoan || ! $matkhau || ! $verify_matkhau || ! $email || ! $hoten || ! $ngaysinh || ! $diachi || ! $sdt)
	{
		echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if ( mysql_num_rows(mysql_query("SELECT taikhoan FROM khachhang WHERE taikhoan='$taikhoan'"))>0)
	{
		echo "<script>alert('Tên đăng nhập đã có người đùng vui lòng chọn tên đăng kí khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	// Kiểm tra email nay co hop le ko
	if (!check_email($email))
	{
		echo "<script>alert('Email Không hợp lệ vui lòng nhâp email khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}",$ngaysinh))
	{
		echo "<script>alert('Ngày tháng năm sinh không hợp lệ vui lòng nhâp (dd/mm/yyyy)')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	// Kiểm tra email nay co nguoi dung chua
	if ( mysql_num_rows(mysql_query("SELECT email FROM khachhang WHERE email='$email'"))>0)
	{
		echo "<script>alert('Email đã có người dùng vui lòng chọn email khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if(preg_match($check, $sdt) == 0)
	{
		echo "<script>alert('Số điện thoại bạn nhập chưa đúng')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	// Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
	if ( $matkhau != $verify_matkhau )
	{
		echo "<script>alert('Mật khẩu không giống nhau')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	
	// Tiến hành tạo tài khoản
	@$a=mysql_query("INSERT INTO khachhang (taikhoan, matkhau, email ,hoten ,ngaysinh ,diachi ,sdt) VALUES ('{$taikhoan}', '{$matkhau}', '{$email}', '{$hoten}', '{$ngaysinh}', '{$diachi}', '{$sdt}')");
	
	// Thông báo hoàn tất việc tạo tài khoản
	if ($a)
	{echo "<script>alert('Tài khoản {$taikhoan} đã được tạo.')</script>";
	echo "<script>window.location='/index.php/?page=dangnhap'</script>";}
	else
		echo "<script>alert('Có lỗi trong việc tạo tài khoản vui lòng liên hê BQT')</script>";
}
else
{
}
?>