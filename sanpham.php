<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../clothes_shop/assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../clothes_shop/assets/css/trangchu.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="../clothes_shop/assets/css/sanpham.css?v=<?= time(); ?>">
    <style>

    </style>
</head>

<body>
    <div id="header_insert">
        <?php include '../clothes_shop/includes/header.php'; ?>
    </div>

    <div id="content">
        <hr>
        <h3 class="content_subheading">tất cả sản phẩm</h3>
        <?php
        include '../clothes_shop/includes/product.php'
        ?>
    </div>
    <div id="footer_insert">
        <?php include '../clothes_shop/includes/footer.php'; ?>
    </div>
    <script src="../clothes_shop/assets/js/trangchu.js?v=<?= time(); ?>"></script>
</body>