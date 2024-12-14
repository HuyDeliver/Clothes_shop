<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../admin/css/style.css?v=<?= time(); ?>">
</head>

<body>
    <!-- Header lớn -->
    <header class="admin-header">
        <h1>Quản trị viên - Trang Admin</h1>
    </header>

    <!-- Navigation -->
    <nav class="admin-nav">
        <ul>
            <li><a href="../admin/index.php">Trang chủ</a></li>
            <li><a href="../admin/index.php?act=danhmuc">Danh mục</a></li>
            <li><a href="../admin/index.php?act=sanpham">Sản phẩm</a></li>
            <li><a href="../admin/index.php?act=taikhoan">Tài khoản</a></li>
            <li><a href="../admin/index.php?act=donhang">Đơn hàng</a></li>
            <li><a href="../admin/index.php?act=thoat">Thoát</a></li>
        </ul>
    </nav>