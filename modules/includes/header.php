<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/trangchu.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/header.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/footer.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/gioithieu.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/sanpham.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/tintuc.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/lienhe.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/viewcart.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/productdetail.css?v=<?= time(); ?>">
    <style>
    </style>
</head>

<body>
    <div id="main">
        <div id="header">
            <ul class="header_topbar">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="username">
                        <img src="/clothes_shop/modules/assets/image/user.jpeg" alt="">
                        <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>
                    </li>
                    <li class="logout"><a href="/clothes_shop/admin/logout.php">Đăng xuất</a></li>
                <?php else: ?>
                    <li class="header_register">ĐĂNG KÍ</li>
                    <li class="header_login">ĐĂNG NHẬP</li>
                <?php endif; ?>
            </ul>
            <hr class="header_hr">

            <ul class="header_midbar">
                <li class="header_search">
                    <input type="text" class="search-input" placeholder="Tìm kiếm">
                    <button type="submit" class="header_icon-search"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </li>
                <li class="header_logo">
                    <img src="/clothes_shop/modules/assets/image/logo.png" alt="">
                </li>
                <li class="header_cart">
                    <span><i class=" header_icon-cart fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <a href="/clothes_shop/modules/index.php?act=giohang" class="header_icon_name">GIỎ HÀNG</a>
                </li>
            </ul>

            <ul class="header_nav">
                <li><a href="/clothes_shop/modules/index.php?act=trangchu">TRANG CHỦ</a></li>
                <li><a href="/clothes_shop/modules/index.php?act=gioithieu">GIỚI THIỆU</a></li>
                <li>
                    <a href="/clothes_shop/modules/index.php?act=sanpham">
                        SẢN PHẨM
                        <i class=" nav_down fa fa-sort-desc" aria-hidden="true"></i>
                    </a>

                    <ul class="sub_nav">
                        <?php
                        foreach ($dsdm as $dm) {
                            echo '<li><a href="/clothes_shop/modules/index.php?act=product&id=' . $dm['id'] . '">' . $dm['cat_name'] . '</a></li>';
                        }
                        ?>
                    </ul>


                </li>
                <li><a href="/clothes_shop/modules/index.php?act=tintuc">TIN TỨC</a></li>
                <li><a href="/clothes_shop/modules/index.php?act=lienhe">LIÊN HỆ</a></li>
            </ul>
        </div>