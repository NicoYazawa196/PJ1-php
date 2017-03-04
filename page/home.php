<div class="heading">
	<span class="heading-label">Sản phẩm mới <img src="../images/new.gif"/></span>
</div>
<div class="sp_content">
<table>
<?php
	$sql = "SELECT * FROM sach WHERE trangthai='1' ORDER BY ngaycapnhat DESC LIMIT 9";
	$result = mysql_query($sql);
	$dem = 0;
	while ($row = mysql_fetch_array($result)) 
	{
		$title = $row['tensach'];
		$image = $row['hinhanh'];
		$price = $row['gia'];
	if ($dem % 3 == 0) {
		echo "<tr>";
	}
			
	echo "<td> 
		<div class='sp_img'><a href='index.php?page=thongtinsach&masach=$row[0]' title='Chi tiết sản phẩm'><img src='$image'/></a></div>
					
		<div class='sp_name'><a class='sp_name' href='index.php?page=thongtinsach&masach=$row[0]'>$title</a></div>

		<div class='sp_gia'>" . number_format($price) . " vnđ</div>
					
		<div class='sp_mua'><a href='index.php?page=add&masach=$row[0]'><img src='../images/icon_muahang.png'/></a></div>
		</td>";
		
		$dem++;
            if ($dem % 3 == 0) {
                echo "</tr>";
            }
	}
?>
</table>
</div>