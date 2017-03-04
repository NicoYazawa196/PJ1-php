<?php
function check_email($email) {
	if (strlen($email) == 0) return false;
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
	return false;
}
error_reporting (E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['themadmin'])) {
	$username = mysql_real_escape_string(addslashes($_POST['username']));
    $email = mysql_real_escape_string(addslashes($_POST['email']));
    $password = mysql_real_escape_string(md5(addslashes($_POST['password'])));
    $ten_quantri = mysql_real_escape_string(addslashes($_POST['ten_quantri']));
    $diachi = mysql_real_escape_string(addslashes($_POST['diachi']));
    $so_dienthoai = addslashes($_POST['so_dienthoai']);
	$check = "/^(09|012|04)[0-9]{8}$/";
	if ( ! $username || ! $password || ! $email || ! $ten_quantri || ! $diachi || ! $so_dienthoai)
	{
		echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if ( mysql_num_rows(mysql_query("SELECT username FROM admin WHERE username='$username'"))>0)
	{
		echo "<script>alert('Tên quản trị đã được sử dụng vui lòng chọn tên khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if (!check_email($email))
	{
		echo "<script>alert('Email Không hợp lệ vui lòng nhâp email khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if ( mysql_num_rows(mysql_query("SELECT email FROM admin WHERE email='$email'"))>0)
	{
		echo "<script>alert('Email đã có người dùng vui lòng chọn email khác')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	if(preg_match($check, $so_dienthoai) == 0)
	{
		echo "<script>alert('Số điện thoại bạn nhập chưa đúng')</script>";
		echo "<script>window.location='javascript:history.go(-1)'</script>";
		exit;
	}
	
    $sql = "INSERT INTO admin(username,email,password,ten_quantri,so_dienthoai,diachi) VALUES('$username','$email','$password','$ten_quantri','$so_dienthoai','$diachi')";
    mysql_query($sql) or die("Loi them quan tri vien");
    echo "<script>alert('Thêm quản trị viên {$username} công')</script>";
    header("location:index.php?page=qlqtv");
}
?>
<div class="titleql">Thêm quản trị viên</div>
<div class="contenner">
    <form id="themadmin" name="themadmin" class="frmRegister" action=""  method="post">
        <table>
			<tr>
                <td><div class="contact"><label>User Name :</label></div></td>
                <td>
                    <div>
                        <input id="email" name="username" type="text" tabindex="1" required="">
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Email :</label></div></td>
                <td>
                    <div>
                        <input id="email" name="email" placeholder="example@gmail.com" type="email" tabindex="1" required="">
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Mật khẩu :</label></div></td>
                <td>
                    <div>
                        <input type="password" id="password" name="password" placeholder="***************" tabindex="2" required="">
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Họ và tên :</label></div></td>
                <td>
                    <div>
                        <input id="hoten" name="ten_quantri" placeholder="Họ và tên của bạn" tabindex="4" type="text" required="">
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Địa chỉ :</label></div></td>
                <td>
                    <div>
                        <textarea id="diachi" name="diachi" placeholder="Bạn cần nhập địa chỉ tối thiểu 15 kí tự !" tabindex="7" rows="5" cols="61" required=""></textarea>
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Số điện thoại :</label></div></td>
                <td>
                    <div>
                        <input id="sdt" name="so_dienthoai" placeholder="Số điện thoại" type="text" tabindex="8" onkeyup="check_sdt(this.value)" required="">
                        <span style="color: red;">*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="buttom" name="themadmin" id="themadmin" tabindex="9" value="Thêm quản trị viên" >&nbsp;<input  type="reset" class="buttom" tabindex="10" value="Nhập lại"></td>
            </tr>
        </table>
    </form>
</div>