<hr class="viewcart_hr">
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
                $i = 0;
                $tong = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    $tt = $item[3] * $item[4];
                    $tong += $tt;
                    echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item[1] . '</td>
                            <td><img src="../admin/' . $item[2] . '" alt="" width=80px></td>
                            <td>' . $item[3] . 'đ</td>
                            <td>' . $item[4] . '</td>
                            <td>' . $tt . 'đ</td>
                            <td><a href="../modules/index.php?act=deletecart&i=' . $i . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
                echo '<tr><td colspan = "5" style="text-align: center;">TỔNG GIÁ TRỊ ĐƠN HÀNG: </td><td>' . $tong . 'đ</td><td><button type="submit" class="btn-action checkout">Thanh Toán</button></td></tr>';
            }
            ?>
        </table>
        <div class="cart-actions">
            <a href="../modules/index.php?act=sanpham" class="btn-action continue-shopping">Tiếp tục mua hàng</a>
            <a href="../modules/index.php?act=deletecart" class="btn-action clear-cart">Xóa giỏ hàng</a>
        </div>

    </div>
    <div class="order-form">
        <h2>Thông tin đặt hàng</h3>
            <form action="../modules/index.php?act=thanhtoan" method="POST">
                <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                <div class="form-group">
                    <input type="text" name="hoten" required placeholder="Họ và Tên">
                </div>
                <div class="form-group">
                    <input type="text" name="address" required placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <input type="email" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" required placeholder="Số điện thoại">
                </div>
                <div class="form-option">
                    <h3>Phương thức thanh toán:</h3>
                    <div class="option">
                        <input type="radio" name="pttt" value="1" required>
                        <label>Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="pttt" value="2">
                        <label>Thanh toán chuyển khoản</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="pttt" value="3">
                        <label> Thanh toán ví Momo</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="pttt" value="4">
                        <label> Thanh toán online</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="THANH TOÁN" name="thanhtoan" class="btn-submit">
                </div>
            </form>
    </div>
</div>