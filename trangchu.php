<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/trangchu.css?v=<?= time(); ?>">
    <style>
    </style>
</head>

<body>
    <div id="main">
        <!-- HEADER -->
        <?php
        include '../clothes_shop/includes/header.php'
        ?>
        <div id="banner">
            <ul class="header_banner">
                <li><a href="">MIỄN PHÍ VẬN CHUYỂN</a></li>
                <li><a href="">MIỄN PHÍ ĐỔI TRẢ</a></li>
                <li><a href="">THANH TOÁN TRỰC TUYẾN</a></li>
            </ul>
        </div>
        <!-- SLIDER -->
        <div id="slider">
            <img src="/clothes_shop/assets/image/slider_1.webp" alt="">
            <div class="img_banner">
                <img src="/clothes_shop/assets/image/banner_1.webp" alt="">
                <img src="/clothes_shop/assets/image/banner_2.webp" alt="">
                <img src="/clothes_shop/assets/image/banner_3.webp" alt="">
            </div>
            <div class="img_brand">
                <i class="img_suft fa fa-angle-left" aria-hidden="true"></i>
                <img src="/clothes_shop/assets/image/brand_1.webp" alt="">
                <img src="/clothes_shop/assets/image/brand_2.webp" alt="">
                <img src="/clothes_shop/assets/image/brand_3.webp" alt="">
                <img src="/clothes_shop/assets/image/brand_4.webp" alt="">
                <img src="/clothes_shop/assets/image/brand_5.webp" alt="">
                <i class="img_suft fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <hr class="img_hr" />
        </div>
        <!-- CONTENT -->
        <div id="content">
            <h3 class="content_subheading">sản phẩm mới</h3>

            <?php
            include '../clothes_shop/includes/product.php'
            ?>
            <div class="content_more">
                <a href="">
                    xem thêm
                </a>
            </div>
            <div class="content_about">
                <h3>về chúng tôi</h3>
                <p>Gentleman sẽ mang lại cho khách hàng những trải nghiệm mua sắm thời trang hàng hiệu trực tuyến thú vị
                    từ các thương hiệu thời trang quốc tế và trong nước, cam kết chất lượng phục vụ hàng đầu cùng với
                    những bộ sưu tập quần áo nam nữ khổng lồ từ giày dép, trang phục, phụ kiện đến mỹ phẩm cho cả phụ nữ
                    và nam giới với những xu hướng thời trang mới nhất. Bạn có thể tìm thấy những bộ trang phục mình
                    muốn từ những bộ đồ ở nhà thật thoải mái hay tự tin trong những bộ trang phục công sở phù hợp. Những
                    trải nghiệm mới chỉ có ở trang mua sắm hàng hiệu trực tuyến Gentleman.</p>
            </div>
        </div>

        <!-- REGISTER -->
        <div id="register">
            <div class="content_contact">
                <div class="content_register">
                    <h2>đăng ký nhận tin</h2>
                    <div class="enter_register">
                        <input type="email" placeholder="Nhập địa chỉ email của bạn" class="enter_email">
                        <button type="submit" class="btn_submit">Đăng ký</button>
                    </div>
                </div>
                <div class="content_social">
                    <h2>Mạng xã hội</h2>
                    <div class="content_app-social">
                        <i class=" icon_soial fa fa-facebook" aria-hidden="true"></i>
                        <i class=" icon_soial fa fa-twitter" aria-hidden="true"></i>
                        <i class=" icon_soial fa fa-instagram" aria-hidden="true"></i>
                        <i class=" icon_soial fa fa-google-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--FOOTER-->

        <?php include '../clothes_shop/includes/footer.php'; ?>

        <!-- Modal layout -->

    </div>
    <script src="../clothes_shop/assets/js/trangchu.js?v=<?= time(); ?>"></script>
</body>

</html>