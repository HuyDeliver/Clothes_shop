
<?php
include '../modules/includes/header.php';
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'product':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
            }
            $dssp = getAll_prod($id, "");
            include '../modules/includes/productsale.php';
            break;
        default:
            include '../modules/view/trangchu.php';
            break;
    }
}
include './includes/footer.php';
