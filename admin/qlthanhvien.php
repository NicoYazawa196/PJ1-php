<div class="contenner">
    <div class="titleql">Quản lý thành viên</div>
    <table class="table">
        <tr class="table_header">
			<th width="197"  class="xuoc">Tên Tài Khoản</th>
            <th width="201"  class="xuoc">Email</th>
            <th width="191" class="xuoc">Họ và tên</th>
            <th width="140" class="xuoc">Ngày sinh</th>
            <th width="110" class="xuoc">SĐT</th>
            <th width="100" class="xuoc">Địa chỉ</th>
            <th width="40" class="xuoc">Xóa</th>
        </tr>
        <?php
		error_reporting (E_ERROR | E_WARNING | E_PARSE);
        $sql = "SELECT * FROM khachhang ";
        $result = mysql_query($sql) or die("Loi cau lenh lay thong tin qltv");
        while ($row = mysql_fetch_array($result)) {
           
            echo "<tr class='table_content'>
				<td class='xuoc'><div style='width: 195px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['taikhoan']}</div></td>
                <td class='xuoc'><div style='width: 198px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['email']}</div></td>
                <td class='xuoc'><div style='width: 188px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['hoten']}</div></td>
                <td class='xuoc'><div style='width: 138px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['ngaysinh']}</div></td>
                <td class='xuoc'><div style='width: 109px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['sdt']}</div></td>
                <td class='xuoc'><div style='width: 99px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['diachi']}</div></td>
                <td class='xuoc'><div style='width: 39px;height: auto;margin: 0;padding: 0;font-size: 14px;'><a title='Xóa tài khoản' href='xoathanhvien.php?matv={$row['ma_khachhang']}'>X</a></div></td>
            </tr>";
        }
		
//            $mathanhvien = $row['Email'];
//        echo "$mathanhvien";
        ?>
    </table>
</div>            