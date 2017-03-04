<?php
if (isset($_POST['themsp'])) {
    if (isset($_FILES["hinhanh"])) {
        if ($_FILES["hinhanh"]["error"] > 0) {
            echo "Co loi khi upload: " . $_FILES["hinhanh"]["error"];
        } else {
            $tensach = mysql_real_escape_string($_POST['tensach']);
            $tentacgia = mysql_real_escape_string($_POST['tentacgia']);
			$nhaxuatban = mysql_real_escape_string($_POST['nhaxuatban']);
			$theloai = mysql_real_escape_string($_POST['theloai']);
			$gia = mysql_real_escape_string($_POST['gia']);
			$noidung = mysql_real_escape_string($_POST['noidung']);
			$ngaycapnhat = date('Y-m-d h:i:s');
            $tt = $_POST['trangthai'];

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
                $ha= "images/sp".$d."$ext";
            } else {
                echo "sai dinh dang file anh";
            }
            $sql1 = "INSERT INTO sach(tensach, tentacgia, matheloai, nhaxuatban, hinhanh,noidung,gia,ngaycapnhat,trangthai) VALUES('$tensach','$tentacgia','$theloai','$nhaxuatban','$ha','$noidung','$gia','$ngaycapnhat','$tt')";
            $result1 = mysql_query($sql1) or die('loi them san pham');
            if ($result1) {
                echo "<script>alert('Thêm sản phẩm thành công.')</script>";
                echo "<script>window.location='index.php?page=sp'</script>";
            } else {
                echo "<script>alert('Thêm sản phẩm không thành công.')</script>";
            }
        }
    }
}
?>
<div class="titleql">Thêm sản phẩm</div>
<div class="contenner">
    <form id="themsp" name="themsp" class="frmaddsp" action=""  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td width="140"><div class="contact"><label>Tên sách :</label></div></td>
                <td>
                    <input id="tensp" name="tensach" type="text" tabindex="1">
                </td>
            </tr>
			<tr>
                <td><div class="contact"><label>Tên tác giả :</label></div></td>
                <td>
                    <div>
                        <input id="soluong" name="tentacgia" type="text" tabindex="6">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Giá :</label></div></td>
                <td>
                    <input type="text" id="gia" name="gia" tabindex="2">
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Hình ảnh :</label></div></td>
                <td>
                    <input  type="file" name="hinhanh" tabindex="3"/>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Thể loại :</label></div></td>
                <td>
                    <select class="select-style gioitinh" id="nsx" name="theloai" tabindex="4">
                        <?php
                        $sql = "SELECT * FROM theloai";
                        $result = mysql_query($sql) or die("Loi lay ma nsx them sp");
                        while ($rows = mysql_fetch_array($result)) {
                            echo "<option value='{$rows['matheloai']}'>{$rows['tentheloai']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Nhà xuất bản :</label></div></td>
                <td>
                    <div>
                        <input id="baohanh" name="nhaxuatban" type="text" tabindex="5">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div class="contact"><label>Nội dung :</label></div></td>
                <td>
                    <div>
                        <textarea id="mota" name="noidung" tabindex="7" rows="20" cols="70" ></textarea>
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
                <td><input type="submit" class="buttom" name="themsp" id="themsp" tabindex="9" value="Thêm sản phẩm" >&nbsp;<input  type="reset" class="buttom" tabindex="10" value="Nhập lại"></td>
            </tr>
        </table>
    </form>
</div>
