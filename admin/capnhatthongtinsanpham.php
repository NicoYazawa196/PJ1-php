<?php
if (isset($_GET['masp'])) {
    $ma = $_GET['masp'];

    $sqltt = "SELECT * FROM sach WHERE masach=$ma";
    $resulttt = mysql_query($sqltt) or die("Loi lay thong tin sp cap nhat");
    while ($rowtt = mysql_fetch_array($resulttt)) {
        $tensachht = $rowtt['tensach'];
        $tentacgiaht = $rowtt['tentacgia'];
        $matheloaiht = $rowtt['matheloai'];
        $nhaxuatbanht = $rowtt['nhaxuatban'];
        $noidunght = $rowtt['noidung'];
		$giaht = $rowtt['gia'];
		$hinhanhht = $rowtt['hinhanh'];
		$masp= $rowtt['masach'];
    }
}
?>
<?php
if (isset($_POST['capnhatttsp'])) {
    $tensach = $_POST['tensach'];
    $tentacgia = $_POST['tentacgia'];
    $matheloai = $_POST['matheloai'];
    $nhaxuatban = $_POST['nhaxuatban'];
    $noidung = $_POST['noidung'];
    $gia = $_POST['gia'];
    $tt = $_POST['trangthai'];
    $ngaycapnhat = date('Y-m-d h:i:s');

    $hinhanh = "../images/img_sp/";
    if ($_FILES["hinhanh"]["type"] == "image/jpeg") {
        $ext = ".jpg";
    }

    if ($_FILES["hinhanh"]["type"] == "image/gif") {
        $ext = ".gif";
    }
    if ($_FILES["hinhanh"]["type"] == "image/png") {
        $ext = ".png";
    }

    if ($_FILES["hinhanh"]["type"] == "image/jpeg" || $_FILES["hinhanh"]["type"] == "image/gif" || $_FILES["hinhanh"]["type"] == "image/png") {
        $d = rand(0, 50000);
        $hinhanh = $hinhanh . "sp" . $d . $ext;
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $hinhanh);
        $ha = "images/img_sp/sp" . $d . "$ext";
    } else {
        echo "Hình ảnh chưa được cập nhật";
    }
	if(!isset($ha))
	{
		$ha=$hinhanhht;
	}
	
    $sql = "UPDATE sach SET tensach='$tensach',tentacgia='$tentacgia',hinhanh='$ha',matheloai='$matheloai',nhaxuatban='$nhaxuatban',noidung='$noidung',gia='$gia',trangthai='$tt',ngaycapnhat='$ngaycapnhat' WHERE masach=$ma";
    mysql_query($sql) or die("Loi update san pham");
    echo "<script>alert('Cập nhật thông tin sản phẩm thành công')</script>";
    echo "<script>window.location='index.php?page=sp'</script>";
}
?>
<div class="titleql">Cập nhật sản phẩm</div>
<div class="contenner">
    <form class="frmaddsp" action=""  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><div class="contact"><label>Tên sách :</label></div></td>
                <td>
                    <div>
                        <input id="tensp" name="tensach" type="text" value="<?php echo $tensachht ?>" tabindex="1">
                    </div>
                </td>
            </tr>
			<tr>
                <td><div class="contact"><label>Tên tác giả :</label></div></td>
                <td>
                    <div>
                        <input id="soluong" name="tentacgia" type="text" value="<?php echo $tentacgiaht ?>" tabindex="6">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Giá :</label></div></td>
                <td>
                    <div>
                        <input type="text" id="gia" name="gia" value="<?php echo $giaht ?>" tabindex="2">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Hình ảnh :</label></div></td>
                <td>
                    <div>
                        <input id="hinhanh" name="hinhanh" type="file" tabindex="3">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Nhà thể loại :</label></div></td>
                <td>
                    <div>
                        <select class="select-style gioitinh" id="nsx" name="matheloai" tabindex="4">
                            <?php
                            $sql = "SELECT * FROM theloai";
                            $result = mysql_query($sql) or die("Loi lay ma nsx them sp");
                            while ($rows = mysql_fetch_array($result)) {
                                echo "<option value='{$rows['matheloai']}'>{$rows['tentheloai']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Nhà xuất bản :</label></div></td>
                <td>
                    <div>
                        <input id="baohanh" name="nhaxuatban" type="text"  value="<?php echo $nhaxuatbanht ?>" tabindex="5">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Nội dung cập nhật:</label></div></td>
                <td>
                    <div>
                        <textarea id="mota" name="noidung" tabindex="7" rows="20" cols="70"  readonly="readonly"><?php echo $noidunght ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Trạng thái :</label></div></td>
                <td>
                    <div>
                        <select class="select-style gioitinh" id="trangthai" name="trangthai" tabindex="8">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="buttom" name="capnhatttsp" id="capnhatttsp" tabindex="9" value="Cập nhật thông tin" >&nbsp;<input  type="reset" class="buttom" tabindex="10" value="Nhập lại"></td>
            </tr>
        </table>
    </form>
</div>
