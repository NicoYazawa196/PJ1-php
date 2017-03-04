<?php
if (isset($_GET["page_number"])) {
    $sotrang = $_GET["page_number"];
    $start = ($sotrang - 1) * 12;
} else {
    $start = 0;
}
$sql = "SELECT * FROM sach limit $start,12";
$result = mysql_query($sql);
$totalpage = ceil(mysql_num_rows(mysql_query("SELECT * FROM sach")) / 12);
?>
<div class="contenner">
    <div class="sp_content">
	<div class="titleql">Thông tin sản phẩm</div>
        <table>
            <?php
            $dem = 0;
            while ($row = mysql_fetch_array($result)) {
                $masp = $row['masach'];
                $image = $row['hinhanh'];
                $title = $row['tensach'];
                $price = $row['gia'];
                if ($dem % 4 == 0) {
                    echo "<tr>";
                }
                echo "<td>
					<div class='item'><img src='../$image'/><div class='infoPro'>
					<div class='titlePro'>$title</div>
					<div class='pricePro'>" . number_format($price) . " vnđ</div>
					<div class='iconsp'><a title='Cập nhật thông tin sản phẩm' href='index.php?page=capnhatttsp&masp={$row['masach']}'>Cập nhật</a></div></div>
					</td>";
                $dem++;
                if ($dem % 4 == 0) {
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <div class="sp_trang">
            <?php
			if ($_GET["page_number"] > 2) 
			{
				echo "<a href='index.php?page=sp&page_number=1'>Đầu</a>";
			}
			if ($_GET["page_number"] > 1) 
			{
				$back=$_GET["page_number"]-1;
				echo "<a href='index.php?page=sp&page_number=$back'>Back</a>";
			}
            for ($i = 1; $i <= $totalpage; $i++) {
                echo "<b><a style='text-decoration: none;' href='index.php?page=sp&page_number=$i'>$i</a></b>";
            }
			if ($_GET["page_number"] < $totalpage) 
			{
				$next=$_GET["page_number"]+1;
				echo "<a href='index.php?page=sp&page_number=$next'>Next</a>";
			}
			if ($_GET["page_number"] < $totalpage) 
			{
				$cuoi=$totalpage;
				echo "<a href='index.php?page=sp&page_number=$cuoi'>Cuối</a>";
			}
            echo "</div>";
            ?>
        </div>
    </div>
</div>