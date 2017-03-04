<div class="menu">
	<ul class="navigation">
    <?php
	error_reporting (E_ERROR | E_WARNING | E_PARSE);
		session_start();
		if(!$_SESSION["user_id"]){
			echo"<p id='sign-label'><a href='/index.php?page=dangnhap'>Đăng nhập</a></p>";
			echo"<p id='sign-label'><a href='/index.php?page=dangky'>Tạo tài khoản</a></p>";
		}
		else
		{
			$user_id = intval($_SESSION["user_id"]);
			$sql_query = @mysql_query("SELECT * FROM khachhang WHERE ma_khachhang='{$user_id}'");
			$khachhang = @mysql_fetch_array( $sql_query ); 
				echo "<div class='account'>{$khachhang['taikhoan']}</div>";
				echo "<br><a href='/index.php?page=suathongtin'>Sửa thông tin tài khoản</a>";
				echo "<br><a href='/page/thoat.php'>Thoát ra</a>";
		}
    ?>
    
	<p class="danhmuc">Danh mục sách</p>
		<ul>
            <?php
                $sql = "SELECT * FROM theloai";
                $result = mysql_query($sql);
                while ($rows = mysql_fetch_array($result)) {
                    echo "<li><a href='index.php?page=theloai&matheloai={$rows[0]}&p=1'><span>{$rows['tentheloai']}</span></a><ul class='sub-level'>";
                    echo "</ul>";
                }
                ?>
		</ul>
	</ul>
</div> 