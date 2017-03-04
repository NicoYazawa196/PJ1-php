<div class="contenner">
    <div class="titleql">Quản lý góp ý</div>
    <table class="table">
        <tr class="table_header">
            <th width="150" class="xuoc">Họ và tên</th>
            <th width="250" class="xuoc">Email</th>
            <th width="400" class="xuoc">Nội dung</th>
            <th width="40" class="xuoc">Xóa</th>
        </tr>
        <?php
        $sql = "SELECT * FROM phanhoi";
        $result = mysql_query($sql) or die("Loi cau lenh lay thong tin qltv");
        while ($row = mysql_fetch_array($result)) {
            $magopy = $row['ma_phanhoi'];
            echo "<tr class='table_content'>
                    <td class='xuocgopy'><div style='width: 150px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['ten']}</div></td>
                    <td class='xuocgopy'><div style='width: 250px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['email']}</div></td>
                    <td class='xuocgopy'><div style='width: 400px;height: auto;margin: 0;padding: 0;font-size: 14px;'>{$row['noidung']}</div></td>
                    <td class='xuocgopy'><div style='text-decoration: none;width: 40px;text-aligh:center;height: auto;margin: 0;text-align: center;padding: 0;font-size: 14px;'><a style='text-decoration: none; title='Xóa tài khoản' href='xoagopy.php?magopy={$magopy}'>X</a></div></td>
            </tr>";
        }
        ?>
    </table>
</div>            