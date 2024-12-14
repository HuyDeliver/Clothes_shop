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
                            <td><a href="../admin/index.php?act=updatedh&id=' . $ca['id'] . '">Sửa</a> | <a href="../admin/index.php?act=deletedh&id=' . $ca['id'] . '">Xóa</a> | <a href="../admin/index.php?act=detaildh">Chi tiết</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>