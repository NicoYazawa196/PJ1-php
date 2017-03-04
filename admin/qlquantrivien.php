
<div class="contenner">
    <div class="titleql">Quản lý quản trị viên</div>
    <table class="table">
        <tr class="table_header">
			<th class="column_header">Tài khoản</th>
            <th class="column_header">Email</th>
            <th class="column_header">Họ và tên</th>
            <th class="column_header">Địa chỉ</th>
			<th class="column_header">Số điện thoại</th>
            <th class="column_header">Xóa tài khoản</th>
        </tr>
        <?php
		error_reporting (E_ERROR | E_WARNING | E_PARSE);
        $sql = "SELECT * FROM admin";
        $result = mysql_query($sql) or die("Loi cau lenh lay thong tin qlqtv");
		while ($row = mysql_fetch_assoc($result)) {
        
            echo "<tr class='table_content'>
					<td class='xuoc'><div style='width: 164px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['username']}</div></td>
                    <td class='xuoc'><div style='width: 164px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['email']}</div></td>
                    <td class='xuoc'><div style='width: 159px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['ten_quantri']}</div></td>
					<td class='xuoc'><div style='width: 158px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['diachi']}</div></td>
                    <td class='xuoc'><div style='width: 163px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['so_dienthoai']}</div></td>
                    <td class='xuoc'><div style='width: 165px;height: auto;margin: 0;padding: 0;font-size: 14px;'><a title='Xóa tài khoản' href='xoaadmin.php?id={$row['ma_quantri']}'>X</a></div></td>
                </tr>";
		}
        ?>
    </table>
</div>