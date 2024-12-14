<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include '../connection/connect_dtb.php';
    include '../connection/CatalogHandling.php';
    include '../connection/UserControlling.php';
    include '../connection/ProductHandling.php';
    include '../connection/CartControlling.php';
    include '../admin/view/header.php';
    // connectDTB();

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
                //Nhận yêu cầu và xử lý
                //lấy ds danh mục
                //XỬ LÝ DANH MỤC
            case 'danhmuc':
                $kq = getAll_catalog();
                include '../admin/view/danhmuc.php';
                break;
            case 'adddm':
                //Nhận yêu cầu và xử lý
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $cat_name = $_POST['tendm'];
                    adddm($cat_name);
                }
                $kq = getAll_catalog();
                include '../admin/view/danhmuc.php';
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delete($id);
                }
                // include '../admin/view/sanpham.php';
                $kq = getAll_catalog();
                include '../admin/view/danhmuc.php';
                break;
            case 'updatedmform':
                //Lấy 1 record đúng với id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getOnedm($id);
                    //cần danh sách danh mục
                    $kq = getAll_catalog();
                    include '../admin/view/updatedmform.php';
                    break;
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $cat_name = $_POST['tendm'];
                    updatedm($id, $cat_name);
                    $kq = getAll_catalog();
                    include '../admin/view/danhmuc.php';
                    break;
                }
                //END XỬ LÝ DANH MỤC



                //XỬ LÝ SẢN PHẨM
            case 'sanpham':
                $dsdm = getAll_catalog();
                $kq = getAll_prod();
                include '../admin/view/sanpham.php';
                break;

            case 'addsp':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $allowedTypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/webp'];
                    $maxSize = 2 * 1024 * 1024; // 2MB
                    $uploadDir = __DIR__ . '/upload/';
                    $img = ''; // Khởi tạo giá trị mặc định

                    // Xử lý upload ảnh
                    if (isset($_FILES["hinh"]) && $_FILES["hinh"]["error"] == 0) {
                        if (in_array($_FILES["hinh"]["type"], $allowedTypes) && $_FILES["hinh"]["size"] <= $maxSize) {
                            $originalName = pathinfo($_FILES["hinh"]["name"], PATHINFO_FILENAME);
                            $extension = pathinfo($_FILES["hinh"]["name"], PATHINFO_EXTENSION);
                            $targetFile = $uploadDir . $originalName . '.' . $extension;

                            // Nếu file tồn tại, tạo tên file mới với timestamp
                            if (file_exists($targetFile)) {
                                $targetFile = $uploadDir . $originalName . '_' . time() . '.' . $extension;
                            }

                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $targetFile)) {
                                $img = 'upload/' . basename($targetFile);
                            } else {
                                echo "Không thể di chuyển file.";
                            }
                        } else {
                            echo "File không hợp lệ hoặc vượt quá kích thước cho phép.";
                        }
                    }
                    // Lấy dữ liệu từ form
                    $iddm = $_POST['iddm'];
                    $name = $_POST['tensp'];
                    $price = $_POST['price'];
                    $sale = $_POST['sale'];

                    // Gọi hàm thêm sản phẩm
                    if ($img == '') {
                        echo "Không thể thêm sản phẩm vì thiếu ảnh.";
                    } else {
                        addsp($iddm, $name, $price, $sale, $img);
                    }
                }

                $dsdm = getAll_catalog();
                $kq = getAll_prod();
                include '../admin/view/sanpham.php';
                break;

            case 'updatesp':
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                    // Hiển thị giao diện cập nhật
                    $id = $_GET['id'];
                    $getOne = getOne($id); // Lấy thông tin sản phẩm cần sửa
                    $dsdm = getAll_catalog();
                    $kq = getAll_prod();
                    include '../admin/view/updatesp.php';
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Xử lý cập nhật sản phẩm
                    $allowedTypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/webp'];
                    $maxSize = 2 * 1024 * 1024; // 2MB
                    $uploadDir = __DIR__ . '/upload/';
                    $img = '';

                    // Lấy dữ liệu từ form
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $name = $_POST['tensp'];
                    $price = $_POST['price'];
                    $sale = $_POST['sale'];
                    $old_img = $_POST['old_img']; // Hình ảnh hiện tại

                    // Kiểm tra nếu có file mới được upload
                    if (isset($_FILES["hinh"]) && $_FILES["hinh"]["error"] == 0) {
                        if (in_array($_FILES["hinh"]["type"], $allowedTypes) && $_FILES["hinh"]["size"] <= $maxSize) {
                            $originalName = pathinfo($_FILES["hinh"]["name"], PATHINFO_FILENAME);
                            $extension = pathinfo($_FILES["hinh"]["name"], PATHINFO_EXTENSION);
                            $targetFile = $uploadDir . $originalName . '.' . $extension;

                            // Nếu file tồn tại, tạo tên file mới với timestamp
                            if (file_exists($targetFile)) {
                                $targetFile = $uploadDir . $originalName . '_' . time() . '.' . $extension;
                            }

                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $targetFile)) {
                                $img = 'upload/' . basename($targetFile);
                            } else {
                                echo "Không thể di chuyển file.";
                            }
                        } else {
                            echo "File không hợp lệ hoặc vượt quá kích thước cho phép.";
                        }
                    }

                    // Nếu không upload hình ảnh mới, giữ nguyên hình ảnh cũ
                    if (empty($img)) {
                        $img = $old_img;
                    }

                    // Gọi hàm cập nhật sản phẩm
                    updatesp($id, $iddm, $name, $price, $sale, $img);
                    $dsdm = getAll_catalog();
                    $kq = getAll_prod();
                    include '../admin/view/sanpham.php';
                }
                break;

            case 'deletesp':
                if (isset($_GET['id']) && ($_GET['id'])) {
                    $id = $_GET['id'];
                    deletesp($id);
                }
                $kq = getAll_prod();
                $dsdm = getAll_catalog();
                include '../admin/view/sanpham.php';
                break;
                //XỬ LÝ USER
            case 'taikhoan':
                $kq = getAllUser();
                include '../admin/view/taikhoan.php';
                break;
            case 'updatetk':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $takeone = takeOne($id);
                    $kq = getAllUser();
                    include '../admin/view/updatetk.php';
                    break;
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $user = $_POST['tentk'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    updatetk($id, $user, $email, $pass, $role);
                    $kq = getAllUser();
                    include '../admin/view/taikhoan.php';
                    break;
                }
            case 'deletetk':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deletetk($id);
                }
                $kq = getAllUser();
                include '../admin/view/taikhoan.php';
                break;
            case 'addtk':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $user = $_POST['tentk'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    addtk($user, $email, $pass, $role);
                }
                $kq = getAllUser();
                include '../admin/view/taikhoan.php';
                break;
                //END XỬ LÝ USER


            case 'donhang':
                $kq = getAllCart();
                include '../admin/view/donhang.php';
                break;
            case 'detaildh':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kq = getcartDetail($id);
                }
                include '../admin/view/detaildh.php';
                break;
            case 'updatedh':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $getOne = getOnecart($id);
                    $kq = getAllCart();
                    include '../admin/view/updatedh.php';
                    break;
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $ttdh = $_POST['ttdh'];
                    $madh = $_POST['madh'];
                    updatedh($id, $madh, $ttdh);
                    $kq = getAllCart();
                    include '../admin/view/donhang.php';
                    break;
                }
            case 'deletedh':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deletdh($id);
                }
                $kq = getAllCart();
                include '../admin/view/donhang.php';
                break;
            case 'thoat':
                unset($_SESSION['role']);
                session_destroy();
                header('Location: login.php');
            default:
                include '../admin/view/home.php';
                break;
        }
    } else {
        include '../admin/view/home.php';
    }

    include '../admin/view/footer.php';
} else {
    header('Location: login.php');
}
