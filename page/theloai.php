<?php
if (isset($_GET["p"])) {
    $sotrang = $_GET["p"];
    $start = ($sotrang - 1) * 6;
} else {
    $start = 0;
}
if (isset($_GET["matheloai"])) {
    $maloai = $_GET["matheloai"];
    $sql = "SELECT * FROM sach WHERE matheloai=$maloai limit $start,6";
    $result = mysql_query($sql);
    $totalpage = ceil(mysql_num_rows(mysql_query("SELECT * FROM sach WHERE matheloai=$maloai")) / 6);
}
?>

<div class="heading">
	<span class="heading-label">
	<?php
	$maloai2 = $_GET["matheloai"];
    $sql2 = "SELECT * FROM theloai where matheloai=$maloai2";
    $result2 = mysql_query($sql2);
    while ($rows2 = mysql_fetch_array($result2)) {
                    echo "{$rows2['tentheloai']}";
    }
    ?>
	</span>
</div>

<div class="sp_content">
<table>
<?php
	$dem = 0;
	while ($row = mysql_fetch_array($result)) {
		$title = $row['tensach'];
		$image = $row['hinhanh'];
		$price = $row['gia'];
	if ($dem % 3 == 0) {
		echo "<tr>";
	}
			
	echo "<td> 
		<div class='sp_img'><a href='index.php?page=thongtinsach&masach=$row[0]'><img src='$image'/></a></div>
					
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
<div class="sp_trang">
	
	<?php
	if ($_GET['p'] > 1) 
	{
		echo "<a href='index.php?page=theloai&matheloai=$maloai&p=1'>Đầu</a>";
	}
	if ($_GET['p'] > 1) 
	{
		$back=$_GET['p']-1;
		echo "<a href='index.php?page=theloai&matheloai=$maloai&p=$back'>Back</a>";
	}
	
	if (isset($totalpage)){
        for ($i = 1; $i <= $totalpage; $i++) {
            echo "<a href='index.php?page=theloai&matheloai=$maloai&p=$i'>$i</a>";
        }
	}
	if ($_GET['p'] < $totalpage) 
	{
		$next=$_GET['p']+1;
		 echo "<a href='index.php?page=theloai&matheloai=$maloai&p=$next'>Next</a>";
	}
	if ($_GET['p'] < $totalpage) 
	{
		$cuoi=$totalpage;
		 echo "<a href='index.php?page=theloai&matheloai=$maloai&p=$cuoi'>Cuối</a>";
	}
	?>
    </div>
</div>