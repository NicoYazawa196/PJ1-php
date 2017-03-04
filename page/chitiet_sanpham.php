<?php
include 'config.php';
$id = $_GET['masp'];
$sql = "SELECT * FROM sach WHERE masach=$id";
$result = mysql_query($sql);
?>

<form>
	<?php
		while ($row = mysql_fetch_array($result)) {
			$tensp = $row['tensach'];
            $anh = $row['hinhanh'];
			$tacgia = $row['tentacgia'];
			$gia = $row['gia'];
            $noidung = $row['noidung'];
		}
	?>
	<div class="info">
	<div class="info-label">
		<?php
			echo "<div>$tensp</div>";
			echo "<div>$tacgia</div>";
			echo "Giá bán: ".number_format($gia)." vnđ";
		?>
    </div>
    
    <div class="info-img">
    	<?php
    		echo "<img src='$anh'/>";
		?>
    </div>
    
    <div class="info-content">
		<?php
			echo "<div class='ctspName'>$noidung</div>";
        ?>
    </div>

                <div class="bt-ct">
                    <a href="index.php?page=giohang&masp=<?php echo $id ?>" title="Thêm sản phẩm">Thêm vào giỏ hàng</a>
	</div>
    </div>
</form>
