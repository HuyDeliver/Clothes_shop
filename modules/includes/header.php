<?php
session_start();
include '/Wampp/www/PhpProgram/clothes_shop/connection/connect_dtb.php';
include '/Wampp/www/PhpProgram/clothes_shop/connection/CatalogHandling.php';
include '/Wampp/www/PhpProgram/clothes_shop/connection/ProductHandling.php';
$dsdm = getAll_catalog();
$sphome2 = getAll_prod(0, "");
$sphome1 = get_prodmain(0, "");
?>
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
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/gioithieu.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/sanpham.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/tintuc.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/clothes_shop/modules/assets/css/lienhe.css?v=<?= time(); ?>">
    <style>
    </style>
</head>

<body>
    <div id="main">
        <div id="header">
            <ul class="header_topbar">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="username">
                        <img src="/clothes_shop/assets/image/user.jpeg" alt="">
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
                    <img src="../assets/image/logo.png" alt="">
                </li>
                <li class="header_cart">
                    <span><i class=" header_icon-cart fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <span class="heaer_icon_name">GIỎ HÀNG</span>
                </li>
            </ul>

            <ul class="header_nav">
                <li><a href="/clothes_shop/modules/view/trangchu.php">TRANG CHỦ</a></li>
                <li><a href="/clothes_shop/modules/view/gioithieu.php">GIỚI THIỆU</a></li>
                <li>
                    <a href="/clothes_shop/modules/view/sanpham.php">
                        SẢN PHẨM
                        <i class=" nav_down fa fa-sort-desc" aria-hidden="true"></i>
                    </a>

                    <ul class="sub_nav">
                        <?php
                        // include './clothes_shop/modules/index.php';
                        foreach ($dsdm as $dm) {
                            echo '<li><a href="/clothes_shop/modules/index.php?act=product&id=' . $dm['id'] . '">' . $dm['cat_name'] . '</a></li>';
                        }
                        ?>
                    </ul>


                </li>
                <li><a href="/clothes_shop/modules/view/tintuc.php">TIN TỨC</a></li>
                <li><a href="/clothes_shop/modules/view/lienhe.php">LIÊN HỆ</a></li>
            </ul>
        </div>