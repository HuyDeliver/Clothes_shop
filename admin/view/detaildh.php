<div id="main">
    <div class="category">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng hàng</th>
                <th>Hành động</th>
            </tr>
            <?php
            ?>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $ca) {
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $ca['tensp'] . '</td>
                            <td><img src="../admin/' . $ca['img'] . '" alt="Hình sản phẩm" width="80"</td>
                             <td>' . $ca['soluong'] . '</td>
                            <td><a href="../admin/index.php?act=donhang">Quay lại</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>