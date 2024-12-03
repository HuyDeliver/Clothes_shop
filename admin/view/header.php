<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="/clothes_shop/admin/css/style.css?v=<?= time(); ?>">
    <!-- <style>
        /* Reset cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #main {
            margin-left: 40px;
        }

        .category {
            padding: 20px;
        }


        /* Header lớn */
        .admin-header {
            background-color: #26d2d8;
            /* Màu nền xanh */
            color: white;
            /* Màu chữ trắng */
            text-align: center;
            padding: 20px 0;
            /* Khoảng cách trên dưới */
            font-size: 24px;
            font-weight: bold;
        }

        /* Navigation */
        .admin-nav {
            background-color: #f4f4f4;
            /* Màu nền nhạt */
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Đổ bóng nhẹ */
        }

        .admin-nav ul {
            list-style: none;
            /* Xóa bullet point */
            display: flex;
            /* Sử dụng flexbox để đặt ngang */
            justify-content: center;
            /* Canh giữa các link */
            gap: 20px;
            /* Khoảng cách giữa các link */
        }

        .admin-nav a {
            text-decoration: none;
            /* Xóa gạch chân */
            color: #333;
            /* Màu chữ mặc định */
            font-size: 18px;
            /* Kích thước chữ */
            padding: 8px 15px;
            /* Khoảng cách bên trong link */
            border-radius: 5px;
            /* Bo góc cho hiệu ứng đẹp hơn */
            transition: background-color 0.3s, color 0.3s;
            /* Hiệu ứng hover mượt */
        }

        /* Hiệu ứng hover */
        .admin-nav a:hover {
            background-color: black;
            /* Màu nền khi hover */
            color: white;
            /* Màu chữ khi hover */
        }

        .category input[type="text"] {
            padding: 8px;
            width: 30%;
        }

        .category input[type="submit"] {
            padding: 8px;
            width: 8%;
            background-color: #26d2d8;
            cursor: pointer;
        }

        .category h2 {
            margin-bottom: 14px;
        }

        .category input[type="submit"]:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .category .cate_table {
            width: 50%;
            margin-top: 15px;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        /* Dòng tiêu đề */
        tr:first-child {
            background-color: #007BFF;
            /* Màu xanh dương */
            /* color: white; */
            text-transform: uppercase;
        }

        /* Dòng chẵn */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Dòng lẻ */
        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hiệu ứng hover */
        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Liên kết */
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Căn giữa văn bản cho các ô có nút */
        td:last-child {
            text-align: center;
        }

        .main-footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            font-size: 14px;
        }
    </style> -->
</head>

<body>
    <!-- Header lớn -->
    <header class="admin-header">
        <h1>Quản trị viên - Trang Admin</h1>
    </header>

    <!-- Navigation -->
    <nav class="admin-nav">
        <ul>
            <li><a href="/clothes_shop/admin/index.php">Trang chủ</a></li>
            <li><a href="/clothes_shop/admin/index.php?act=danhmuc">Danh mục</a></li>
            <li><a href="/clothes_shop/admin/index.php?act=sanpham">Sản phẩm</a></li>
            <li><a href="/clothes_shop/admin/index.php?act=taikhoan">Tài khoản</a></li>
            <li><a href="/clothes_shop/admin/index.php?act=donhang">Đơn hàng</a></li>
            <li><a href="/clothes_shop/admin/index.php?act=thoat">Thoát</a></li>
        </ul>
    </nav>