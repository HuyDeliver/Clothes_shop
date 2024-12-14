<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../connection/connect_dtb.php';
include '../connection/CatalogHandling.php';
include '../connection/ProductHandling.php';
include '../connection/donhang.php';
$dsdm = getAll_catalog();
// $sphome2 = getAll_prod(0, "");
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
        case 'product':
            if (isset($_POST['search']) && ($_POST['search']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $id = 0;
            }
            if ($id > 0) {
                $dssp = getAll_prod($id, $kyw);
            } else {
                $dssp = getAll_prod($id, $kyw);
            }
            include '../modules/includes/productsale.php';
            break;
        case 'thanhtoan':
            if (isset($_SESSION['user'])) {
                if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'] > 0)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $name = $_POST['hoten'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $madh = "GENTLEMAN" . rand(0, 99999);
                    //tạo đơn hàng
                    //trả về 1 id đơn hàng
                    $iddh = taodonhang($madh, $tongdonhang, $name, $address, $email, $tel, $pttt);
                    $_SESSION['iddh'] = $iddh;
                    if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                        foreach ($_SESSION['giohang'] as $item) {
                            addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
                        }
                        unset($_SESSION['giohang']);
                    }
                }
                include '../modules/view/donhang.php';
                break;
            } else {
                echo '<script>alert("bạn cần phải đăng nhập mới có thể thanh toán !!")</script>';
                include '../modules/view/viewcart.php';
                break;
            }

        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }
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
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                $i = $_GET['i'];
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    array_splice($_SESSION['giohang'], $i, 1);
                }
            } else {
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('Location: ../modules/index.php?act=viewcart');
            } else {
                header('Location: ../modules/index.php?act=trangchu');
            }
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
<script src="../modules/assets/js/trangchu.js?v=<? time() ?>"></script>
<script src="../modules/assets/js/productdetail.js?v=<? time() ?>"></script>
<script src="../modules/assets/js/viewcart.js?v=<? time() ?>"></script>

</body>
</hmtl>