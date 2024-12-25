<hr class="viewcart_hr">
<div class="content_table">
    <div class="category">
        <h2>Đơn hàng</h2>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>

            <?php
            //đọ từ database thì tên là key trong database còn đọc từ session thì là chỉ mục
            if (isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0) {
                $getshowcart = showcart($_SESSION['iddh']);
                if (isset($getshowcart) && (count($getshowcart) > 0)) {
                    $i = 0;
                    $tong = 0;
                    foreach ($getshowcart as $item) {
                        $tt = $item['soluong'] * $item['dongia'];
                        $tong += $tt;
                        echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item['tensp'] . '</td>
                            <td><img src="../admin/' . $item['img'] . '" alt="" width=80px></td>
                            <td>' . $item['dongia'] . 'đ</td>
                            <td>' . $item['soluong'] . '</td>
                            <td>' . $tt . 'đ</td>
                        </tr>';
                        $i++;
                    }
                    echo '<tr><td colspan = "5" style="text-align: center;">TỔNG GIÁ TRỊ ĐƠN HÀNG: </td><td>' . $tong . 'đ</td></tr>';
                } else {
                    echo 'Giỏ hàng rỗng. <a href="../modules/index.php?act=sanpham">Tiếp tục đặt hàng</a>';
                }
            }
            ?>
        </table>
    </div>
    <?php
    if (isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0) {
        $orderInfo = getorderInfo($_SESSION['iddh']);
        if (count($orderInfo) > 0) {
    ?>
            <div class="info_order">
                <h2>Thông tin đặt hàng</h3>
                    <h3>Mã đơn hàng: <?= $orderInfo[0]['madh'] ?></h3>
                    <div class="info-group">
                        <p>Tên người nhận: <?= $orderInfo[0]['name'] ?></p>
                    </div>
                    <div class="info-group">
                        <p>Địa chỉ: <?= $orderInfo[0]['address'] ?></p>
                    </div>
                    <div class="info-group">
                        <p>Email: <?= $orderInfo[0]['email'] ?></p>
                    </div>
                    <div class="info-group">
                        <p>Số điện thoại: <?= $orderInfo[0]['tel'] ?></p>
                    </div>
                    <div class="info-option">
                        <?php
                        switch ($orderInfo[0]['pttt']) {
                            case '1':
                                $txtmess = 'Thanh toán khi nhận hàng';
                                break;
                            case '2':
                                $txtmess = 'Thanh toán chuyển khoản';
                                break;
                            case '3':
                                $txtmess = 'Thanh toán ví Momo';
                                break;
                            case '4':
                                $txtmess = 'Thanh toán online';
                                break;
                            default:
                                $txtmess = 'Quý khách chưa chọn phương thức thanh toán';
                                break;
                        }
                        ?>
                        <p>Phương thức thanh toán: <?= $txtmess ?> </p>
                    </div>
            </div>
    <?php }
    }
    ?>
</div>