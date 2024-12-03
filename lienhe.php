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
    <link rel="stylesheet" href="../clothes_shop/assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../clothes_shop/assets/css/trangchu.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="../clothes_shop/assets/css/lienhe.css?v=<?= time(); ?>">

    <style>

    </style>
</head>

<body>
    <div id="header_insert">
        <?php include '../clothes_shop/includes/header.php'; ?>
    </div>

    <div id="content">
        <hr class="content_hr">
        <h2>LIÊN HỆ</h2>
        <div class="content_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.904274586084!2d105.81330277503172!3d21.03651588061483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1946cc7e23%3A0x87ab3917166a0cd5!2zUGjhuqduIG3hu4FtIHF14bqjbiBsw70gYsOhbiBow6BuZyAtIFNhcG8gUE9T!5e0!3m2!1svi!2s!4v1732556352635!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="content_message">
            <form action="" class="form_action">
                <h3>ĐỂ LẠI LỜI NHẮN</h3>
                <div class="form_control">
                    <label for="name">Họ và tên:</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form_control">
                    <label for="email">Địa chỉ Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form_control">
                    <label for="sđt">Số điện thoại:</label>
                    <input type="number" name="sđt" required>
                </div>
                <div class="form_control">
                    <label for="message">Lời nhắn:</label>
                    <textarea name="message" id="message" required></textarea>
                </div>
                <input type="submit" value="GỬI TIN NHẮN">
            </form>
            <div class="content-contact">
                <h3>Hãy liên hệ với chúng tôi !</h3>
                <ul>
                    <li>
                        <i class="icon_footer fa fa-map-marker" aria-hidden="true"></i>
                        <span><a href="">Tầng 6 - Tòa nhà Ladeco - 266 Đội Cấn, Hà Nội</a></span>
                    </li>
                    <li>
                        <i class="icon_footer fa fa-phone" aria-hidden="true"></i>
                        <span><a href="">1900 6750</a></span>
                    </li>
                    <li>
                        <i class="icon_footer fa fa-envelope" aria-hidden="true"></i>
                        <span><a href="">support@sapo.vn</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="footer_insert">
        <?php include '../clothes_shop/includes/footer.php'; ?>
    </div>
    <script src="../clothes_shop/assets/js/trangchu.js?v=<?= time(); ?>"></script>
</body>