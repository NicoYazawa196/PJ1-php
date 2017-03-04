<?php
	$conn = mysql_connect('localhost', 'root', '') or die('Khong the ket noi voi database');
	mysql_query('SET NAMES UTF8');
	mysql_select_db('mangabook', $conn) or die('Khong the ket noi voi database');
?>