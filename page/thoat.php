<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if (session_destroy()) {
	echo "<script>alert('Thoát ra thành công')</script>";
	}
else
	{echo "<script>alert('KO thể thoát dc, có lỗi trong việc hủy session')</script>";}
header('location:/index.php');
?>