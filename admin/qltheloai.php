<div class="contenner">
    <div class="titleql">Quản lý thể loại</div>
    <form action="themtheloai.php" method="get">
        <div class="theloai"><input type="text" name="tentheloai"/><input type="submit" value="+"/></div>
    </form>
    <table class="table">
        <tr class="table_header">
            <th width="150" class="xuoc">Mã thể loại</th>
            <th width="450" class="xuoc">Tên thể loại</th>
            <th width="100" class="xuoc">Xóa</th>
        </tr>
        <?php
		error_reporting (E_ERROR | E_WARNING | E_PARSE);
        $sql = "SELECT * FROM theloai";
        $result = mysql_query($sql) or die("Loi cau lenh lay du lieu the loai");
        while ($rows = mysql_fetch_array($result)) {
            $matheloai = $rows['matheloai'];
            echo"<tr class='table_content'>
                    <td class='xuoc'><div style='width: 150px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$rows['matheloai']}</div></td>
                    <td class='xuoc'><div style='width: 450px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$rows['tentheloai']}</div></td>
                    <td class='xuoc'><div style='width: 100px;height: auto;margin: 0;padding: 0;font-size: 14px;'><a title='Xóa thể loại' href='xoatheloai.php?matheloai={$rows['matheloai']}'>X</a></div></td>
                </tr>";
        }
        ?>
    </table>
</div>        