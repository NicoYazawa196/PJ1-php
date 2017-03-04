<?php
if (isset($_GET["tukhoa"])) {
    $tukhoa = $_GET["tukhoa"];
}

$sqltk = "SELECT * FROM sach WHERE tensach LIKE '%$tukhoa%'";
$result = mysql_query($sqltk) or die("Không tìm thấy sản phẩm");
?>

<div class="heading">
    <span class="heading-label">
		<?php echo "Tìm kiếm với: $tukhoa"; ?>
    </span>
</div>

<div class="sp_content">
    <table>
    <?php
        $dem = 0;
        while ($row = mysql_fetch_array($result)) {
            $image = $row['hinhanh'];
            $title = $row['tensach'];
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
</div>