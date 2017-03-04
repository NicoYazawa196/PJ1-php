<?php
include "ketnoidb.php";
session_start();
ob_start();
if (!isset($_SESSION["adminlogin"])) {
    header("location:login.php");
} else {
   $user_admin = $_SESSION["adminlogin"];
	$sql_query = @mysql_query("SELECT * FROM admin WHERE username='{$user_admin}'");
	$admin = @mysql_fetch_array( $sql_query );
	$ten_admin = $admin["ten_quantri"];
}
if (isset($_GET['page'])) {
    $act = $_GET['page'];
    $titlepage = '';
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/jsmenu1.js"></script>
    <script type="text/javascript" src="js/jsmenu2.js"></script>
    <script type="text/javascript" src="js/actionmenuselect.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <link rel="stylesheet" type="text/css" href="include/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="include/jsDatePick.jquery.min.1.3.js"></script>

    <script type="text/javascript" src="include/ckeditor/sample.js"></script>
    <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="mainwrapper">
		<?php
			include 'menu.php'
		?>
    </div>
            <div class="rightcontent">
                <div class="header_right">
                    <div class="headerright">
                        <div class="userinfo">
                            <?php
                            echo "<div class='dropmenu_admin'>Chào mừng: $ten_admin <a href='index.php?page=thoat'>Thoát</a></div>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="navigation"><?php // echo $titlepage   ?></div>
            </div>
            <div class="content_admin">
                <?php
                if (!isset($_GET['page'])) {
                    include "home.php";
                    $titlepage = "Hệ thống admin";
                } else {
                    switch ($act) {
                        case "qlqtv":
                            include "qlquantrivien.php";
                            $titlepage = "Quản lý quản trị viên";
                            break;
                        case "qltv":
                            include "qlthanhvien.php";
                            break;
                        case "thoat":
                            include "thoat.php";
                            break;
                        case "themqtv":
                            include "themquantrivien.php";
                            break;
                        case "qlgopy":
                            include "qlgopy.php";
                            break;
                        case "qldh":
                            include "qldonhang.php";
                            break;
                        case "sp":
                            include "sanpham.php";
                            break;
                        case "xoatl":
                            include "xoatheloai.php";
                            break;
                        case "qltl":
                            include "qltheloai.php";
                            break;
                        case "themsp":
                            include "themsanpham.php";
                            break;
                        case "capnhatttsp":
                            include "capnhatthongtinsanpham.php";
                            break;
                        case "chitietdh":
                            include "chitietdh.php";
                            break;
                    }
                }
                ?>
            </div>
        </div>
        <hr style="border: 3px double #666666;margin: 1px 0;"/>
        <div class="ftadmin"><span>&copy;2015 Hệ thống được làm bởi Nhóm 3 lớp C1408I</span></div>
    </div>
</body>