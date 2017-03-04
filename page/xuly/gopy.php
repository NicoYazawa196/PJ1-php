<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
require_once("config.php");
function check_email($email) {
	if (strlen($email) == 0) return false;
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
	return false;
}
	error_reporting (E_ERROR | E_WARNING | E_PARSE);
	$email = addslashes( $_POST['email'] );
	$hoten = addslashes( $_POST['fullname'] );
	$noidung = addslashes( $_POST['noidung'] );
if($_GET['act'] == "do")
{
	if ( ! $email || ! $hoten || ! $noidung)
	{
		echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if (!check_email($email))
	{
		echo "<script>alert('Email Không hợp lệ vui lòng nhâp email khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
}	

	@$a=mysql_query("INSERT INTO phanhoi (email, ten, noidung) VALUES ( '{$email}', '{$hoten}', '{$noidung}')");
	if ($a)
	{
		echo "<script>alert('Góp ý của bạn đã được ghi nhận')</script>";
		echo "<script>window.location='/index.php'</script>";
	}
	else{
		echo "<script>alert('Có lỗi trong việc tạo góp ý vui lòng liên hê BQT')</script>";
	}
?>