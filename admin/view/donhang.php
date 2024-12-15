<div id="main">
    <div class="category">
        <h2>ĐƠN HÀNG</h2>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>
            </tr>
            <?php
            ?>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $ca) {
                    $ttdh = cartstatus($ca['ttdh']);
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $ca['madh'] . '</td>
                            <td>' . $ca['name'] . '</td>
                            <td>' . $ca['soluong'] . '</td>
                            <td>' . $ca['tongdonhang'] . 'đ</td>
                            <td>' . $ttdh . '</td>
                            <td>' . $ca['email'] . '</td>
                            <td>' . $ca['tel'] . '</td>
                            <td>' . $ca['address'] . '</td>
                            <td><a href="../admin/index.php?act=updatedh&id=' . $ca['id'] . '">Sửa</a> <br> <a href="../admin/index.php?act=deletedh&id=' . $ca['id'] . '">Xóa</a> <br> <a href="../admin/index.php?act=detaildh&id=' . $ca['id'] . '">Chi tiết</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>