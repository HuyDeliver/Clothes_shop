<div id="main">
    <div class="category">
        <h2>ĐƠN HÀNG</h2>
        <form action="../admin/index.php?act=updatedh" method="post">
            <select name="ttdh" id="ttdh-select">
                <option value="">Chọn tình trạng đơn hàng</option>
                <?php
                for ($i = 0; $i <= 3; $i++) {
                    $tt = cartstatus($i);
                    echo '<option value="' . $i . '"';
                    if ($i == $tt) {
                        echo 'selected';
                    }
                    echo '>' . $tt . '</option>';
                }
                ?>
            </select>
            <input type="text" name="madh" value="<?= $getOne[0]['madh'] ?>">
            <br>
            <input type="text" name="name" value="<?= $getOne[0]['name'] ?>">
            <input type="email" name="email" value="<?= $getOne[0]['email'] ?>">
            <input type="number" name="tel" value="<?= $getOne[0]['tel'] ?>">
            <input type="text" name="address" value="<?= $getOne[0]['address'] ?>">
            <br>
            <input type="hidden" name="id" value="<?= $getOne[0]['id'] ?>">
            <input type="submit" name="submit" value="Cập nhập">
        </form>
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