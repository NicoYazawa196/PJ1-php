<?php
include 'config.php';
$id = $_GET['masach'];
$sql = "SELECT * FROM sach WHERE masach=$id";
$result = mysql_query($sql);
?>

<?php
	while ($row = mysql_fetch_array($result)) {
		$tensach = $row['tensach'];
		$hinhanh = $row['hinhanh'];
		$tacgia = $row['tentacgia'];
		$nxb = $row['nhaxuatban'];
		$gia = $row['gia'];
		$noidung = $row['noidung'];
		$masach = $row['masach'];
	}
?>

<?php
	echo"<div class='heading'><span class='heading-label'>$tensach</span></div>";
?>

<div class="info">
<form>
    <div class="info-img">
		<?php
    		echo "<img src='$hinhanh'/>";
		?>
    </div>
    
    <div class="info-label">
		<div class="info-tacgia">Tác giả: <span><?php echo"$tacgia"; ?></span></div>
		<div class="info-nxb">NXB: <span><?php echo"$nxb"; ?></span></div>
        <div class="info-gia">Giá bán: <span><?php echo"".number_format($gia)." vnđ"; ?></span></div>
        <div class="info-mua"><a href="index.php?page=add&masach=<?php echo"$masach"; ?>"><img src="../images/icon_muahang.png"/></a></div>
    </div>
    
    <div class="info-content">
	<div class="info-gioithieu">Giới thiệu:</div>
		<?php 
			echo "<div class='ctspName'>$noidung</div>"; 
		?>
    </div>
</form>
</div>
