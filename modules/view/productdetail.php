<div id="content_detail">
    <hr class="pro_hr">
    <div class="pro_detail">
        <form action="../modules/index.php?act=addtocart" method="post">
            <div class="pro_img">
                <img src="../admin/<?= $kq1[0]['img']; ?>" alt="">
            </div>
            <?php
            $price = $kq1[0]['price'];
            $sale = $kq1[0]['sale'];
            if ($kq1[0]['price'] == 0) {
                $gia = 'Đang cập nhập';
            } else {
                if ($kq1[0]['sale'] > 0) {
                    $gia = '<div class="pro_value">
                                <p class="pro_price">' . $price . 'đ</p>
                                <p class="pro_sale">' . $sale . 'đ</p>
                            </div> ';
                } else {
                    $gia = '<div class="pro_value">
                                <p class="pro_price">' . $price . 'đ</p>
                            </div> ';
                }
            }
            ?>
            <div class="pro_buy">
                <h2><?= $kq1[0]['name'] ?></h2>
                <p class="pro_make"><?= $kq1[0]['agency']; ?></p>
                <p class="pro_describe"><?= $kq1[0]['describe']; ?></p>

                <div class="pro_quantity">
                    Số lượng:
                    <input type="number" value="1" min="1" max="50" required name="sl">
                </div>
                <?php
                echo $gia;
                ?>
                <div class="pro_submit">
                    <input type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                    <input type="hidden" value="<?= $kq1[0]['id'] ?>" name="id">
                    <input type="hidden" value="<?= $kq1[0]['name'] ?>" name="tensp">
                    <input type="hidden" value="<?= $kq1[0]['img'] ?>" name="img">
                    <input type="hidden" value="<?= $kq1[0]['price'] ?>" name="gia">
                </div>
            </div>
        </form>
    </div>
    <div class="pro_info">
        <div class="tabs">
            <div class="tab_item active bottom">
                <h3> MÔ TẢ</h3>
            </div>
            <div class="tab_item">
                <h3>BẢNG KÍCH THƯỚC</h3>
            </div>
            <div class="tab_item">
                <h3>CHÍNH SÁCH ĐỔI TRẢ</h3>
            </div>
        </div>
        <hr class="tabs_hr">
        <div class="tabs_content">
            <div class="tabs_pane active">
                <?= $kq1[0]['description'] ?>
            </div>
            <div class="tabs_pane">
                <img src="../modules/assets/image/custom_size.webp" alt="">
            </div>
            <div class="tabs_pane">
                <p>Sản phẩm nguyên giá & giảm giá đến 30% được đổi size/màu hoặc sản phẩm khác (nếu còn hàng), áp dụng 1 đổi 1, đổi 1 lần/1 đơn hàng. Tổng giá trị các mặt hàng muốn đổi phải có giá trị tương đương hoặc lớn hơn với mặt hàng trả lại. GENTLEMAN không hoàn lại tiền thừa trong trường hợp sản phẩm mới có giá trị thấp hơn sản phẩm đã mua</p>
                <p>Sản phẩm giảm giá trên 30% trở lên được đổi size (nếu còn hàng), áp dụng 1 đổi 1, đổi 1 lần/1 đơn hàng.</p>
                <p>Sản phẩm không áp dụng đổi bao gồm: đồ lót, sản phẩm được tặng kèm trong các chương trình</p>
                <p>Khách hàng đổi tại cửa hàng đã mua hàng</p>
                <p>Đổi hàng trong vòng 07 ngày kể từ ngày khách hàng nhận được sản phẩm</p>
                <p>Sản phẩm còn trong tình trạng ban đầu khi nhận hàng, còn nguyên tem và nhãn mác.</p>
                <p>Sản phẩm chưa qua giặt ủi hoặc bẩn, chưa bị hư hỏng, không bị mùi lạ (nước hoa, cơ thể...), chưa qua sử dụng</p>
                <p>Khách hàng mang theo hóa đơn còn nguyên vẹn khi đổi hàng.</p>
            </div>
        </div>
    </div>
</div>