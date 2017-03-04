<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css" />
</head>

<?php
require_once 'ketnoidb.php';
if (isset($_POST["Submit"])) {
    $username = addslashes($_POST["username"]);
    $password = addslashes($_POST["password"]);
    $sql = "SELECT COUNT(*) FROM admin WHERE username='$username' AND password='$password'";
    $result = mysql_query($sql) or die("Loi cau lenh ket noi db admin");
    $row = mysql_fetch_array($result);
    if ($row[0] > 0) {
        $_SESSION["adminlogin"] = $username;
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}
?>
<body class="loginbody">
    <form id="adminloginfrm" name="adminloginfrm" action="" method="post">
        <div class="loginwrapper">
            <div class="logintitle"><img src="images/icon_login.jpg"/><span>Admin Login</span></div>
            <div class="logincontent">
                <form id="loginform" action="" method="post">
                    <input type="text" id="email" name="username" placeholder="Tên tài khoán" required/>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu" required/>
                    <input type="submit" name="Submit" value="Đăng nhập"/>
                </form>
            </div>
        </div>
    </form>
</body>