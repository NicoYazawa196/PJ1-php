<?php
mysql_connect('localhost', 'root', '') or die('Loi ket noi database roi ne');
mysql_query('SET NAMES UTF8');
mysql_select_db('mangabook') or die('Loi ket noi database');
?>