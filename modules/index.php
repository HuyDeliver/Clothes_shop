<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '/Wampp/www/PhpProgram/clothes_shop/connection/connect_dtb.php';
include '/Wampp/www/PhpProgram/clothes_shop/connection/CatalogHandling.php';
include '/Wampp/www/PhpProgram/clothes_shop/connection/ProductHandling.php';
$dsdm = getAll_catalog();
$sphome2 = getAll_prod(0, "");
$sphome1 = get_prodmain(0, "");
include '../modules/includes/header.php';
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'trangchu':
            include '../modules/view/trangchu.php';
            break;
        case 'gioithieu':
            include '../modules/view/gioithieu.php';
            break;
        case 'sanpham':
            include '../modules/view/sanpham.php';
            break;
        case 'tintuc':
            include '../modules/view/tintuc.php';
            break;
        case 'lienhe':
            include '../modules/view/lienhe.php';
            break;
        case 'productdetail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $kq1 = getProdetail($id);
            }
            include '../modules/view/productdetail.php';
            break;
        case 'xemthem':
            include '../modules/view/sanpham.php';
            break;
        case 'product':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
            }
            $dssp = getAll_prod($id, "");
            include '../modules/includes/productsale.php';
            break;
        case 'giohang':
            include '../modules/view/viewcart.php';
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                $sl = 1;
                $fg = 0;
                $i = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[1] == $tensp) {
                        $slnew = $sl + $item[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                //Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay ko ? nếu ko thì cập nhập sp ko thì chỉ tăng số lượng
                //khỏi tạo mảng con trước khi đưa vào giỏ hàng
                if ($fg == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl);
                    $_SESSION['giohang'][] = $item;
                }
                header('Location: index.php?act=viewcart');
            }
            break;
        case 'viewcart':
            include '../modules/view/viewcart.php';
            break;
        case 'deletecart':
            if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            header('Location: ../modules/index.php');
            break;
        case 'continuebuy':
            include '../modules/view/trangchu.php';
            break;
        case 'login':
            include '../modules/view/trangchu.php';
            break;
        case 'logout':
            include '../modules/view/trangchu.php';
            break;
        default:
            include '../modules/view/trangchu.php';
            break;
    }
}
?>
<div id="footer_insert">
    <?php include '../modules/includes/footer.php'; ?>
</div>
<script src="../modules/assets/js/trangchu.js?v=<? time(); ?>"></script>
<script src="../modules/assets/js/productdetail.js?v=<? time() ?>"></script>

</body>
</hmtl>