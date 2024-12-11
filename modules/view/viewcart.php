<div class="content_table">
    <div class="category">
        <h2>Giỏ Hàng</h2>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>

            <?php
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                $i = 1;
                foreach ($_SESSION['giohang'] as $item) {
                    $tt = $item[3] * $item[4];
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $item[1] . '</td>
                            <td>' . $item[2] . '</td>
                            <td>' . $item[3] . '</td>
                            <td>' . $item[4] . '</td>
                            <td>' . $tt . '</td>
                            <td><a href="">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>

    <br>
    <a href="../modules/index.php?act=continuebuy">Tiếp tục mua hàng</a>|<a href="">Thanh Toán</a> | <a href="../modules/index.php?act=deletecart">Xóa giỏ hàng</a>
    <script src="../assets/js/trangchu.js?v=<?= time(); ?>"></script>
</div>