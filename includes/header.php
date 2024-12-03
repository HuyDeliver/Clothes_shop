<div id="header">
    <!-- <link rel="stylesheet" href="../footer-header/style.css"> -->
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
            <img src="../clothes_shop/assets/image/logo.png" alt="">
        </li>
        <li class="header_cart">
            <span><i class=" header_icon-cart fa fa-shopping-cart" aria-hidden="true"></i></span>
            <span class="heaer_icon_name">GIỎ HÀNG</span>
        </li>
    </ul>

    <ul class="header_nav">
        <li><a href="/clothes_shop/trangchu.php">TRANG CHỦ</a></li>
        <li><a href="/clothes_shop/gioithieu.php">GIỚI THIỆU</a></li>
        <li>
            <a href="/clothes_shop/sanpham.php">
                SẢN PHẨM
                <i class=" nav_down fa fa-sort-desc" aria-hidden="true"></i>
            </a>
            <ul class="sub_nav">
                <li><a href="">Sản phẩm khuyến mãi</a></li>
                <li>
                    <a href="">
                        Sản phẩm nổi bật
                        <i class=" nav_right fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <ul class="nav_product">
                        <li><a href="">Áo khoác</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                    </ul>
                </li>
                <li><a href="">Sản phẩm mới</a></li>
            </ul>
        </li>
        <li><a href="/clothes_shop/tintuc.php">TIN TỨC</a></li>
        <li><a href="/clothes_shop/lienhe.php">LIÊN HỆ</a></li>
    </ul>

</div>