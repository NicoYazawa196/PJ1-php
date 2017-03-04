<?php
session_start();
include 'page/config.php';
ob_start();
if (isset($_GET['page'])) {
    $act = $_GET['page'];
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manga Book</title>
    
    <link type="text/css" rel="stylesheet" href="/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="/css/style_menu.css"/>
    <link type="text/css" rel="stylesheet" href="/css/style_home.css"/>
    <link type="text/css" rel="stylesheet" href="/css/style_sanpham.css"/>
    <link type="text/css" rel="stylesheet" href="/css/style_form.css"/>
    
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
</head>

<body>
	<?php
		include '/page/icon_trai.php';
	?>
<div class="container">
	<?php
		include '/page/go_top.php';
	?>
	<div class="wrapper">
    	<header>
			<?php
				include '/page/menu.php';
			?>
    	</header>

	</div>

    <!--<div class="slide">-->
		<?php
			if (!isset($act)) {
				include '/page/slide.php';
            }
        ?>
    <!--</div>-->
    
	<div class="left">
    	<?php
			include '/page/menu_trai.php';
		?>
    </div>
    
    <div class="content">
    	<?php
			if (!isset($act)) {
				include '/page/home.php';
            }
		?>
    	<?php
			if (isset($act)) {
				switch ($act) {
					case "home":
						include 'index.php';
                        break;
					case "dangnhap":
						include '/page/dangnhap.php';
                        break;
					case "suathongtin":
						include '/page/suathongtin.php';
                        break;
					case "dangky":
                        include '/page/dangky.php';
                    	break;
					case "lienhe":
                        include '/page/lienhe.php';
                        break;
					case "gopy":
                        include '/page/gopy.php';
                        break;
                    case "thongtinsach":
                        include '/page/thongtinsach.php';
                        break;
                    case "theloai":
                        include '/page/theloai.php';
                        break;	
					case "giohang":
                        include 'page/giohang.php';
                        break;
					case "add":
                        include 'page/xuly/add_cart.php';
                        break;
					case "dathang":
                        include 'page/muahang.php';
                        break;
                   	case "timkiem":
                        include '/page/timkiem.php';
                        break;
			}}
		?>
    </div>
</div>

    <footer>
    	<?php 
			include '/page/footer.php'
		?>
    </footer>
    
</body>
</html>