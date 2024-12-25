<?php
function deletesp($id)
{
    $conn = connectDTB();
    $sql = "DELETE FROM product WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}


function updatesp($id, $iddm, $name, $price, $sale, $img)
{
    $conn = connectDTB();
    $sql = "UPDATE product SET name= :name, img= :img, price= :price, id_catalog= :id_catalog, sale= :sale WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id_catalog', $iddm);
    $stmt->bindParam(':sale', $sale);
    $stmt->execute();
}
function getOne($id)
{
    $conn = connectDTB();
    $sql = "SELECT * FROM product WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function addsp($iddm, $name, $price, $sale, $img)
{
    $conn = connectDTB(); // Kết nối database
    $sql = "INSERT INTO product (name, img, price, id_catalog, sale) 
            VALUES (:name, :img, :price, :id_catalog, :sale)";
    $stmt = $conn->prepare($sql);

    // Sử dụng ảnh mặc định nếu không có ảnh
    if (empty($img)) {
        $img = 'upload/default.jpg'; // Đường dẫn ảnh mặc định
    }

    // Ràng buộc tham số với giá trị
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id_catalog', $iddm); // Đúng tên tham số
    $stmt->bindParam(':sale', $sale);
    $stmt->execute();
}
function getProdetail($id)
{
    $conn = connectDTB();
    $sql = "SELECT * FROM product WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function get_prodmain($iddm = 0, $kyw = "")
{
    $conn = connectDTB();
    $sql = "SELECT * FROM product WHERE 1 ";
    if ($iddm > 0) $sql .= " AND id_catalog=" . $iddm;
    if ($kyw != "") $sql .= " AND  name= LIKE '%" . $kyw . "%'";
    $sql .= " order by id DESC ";
    $sql .= "LIMIT 8";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getAll_prod($iddm = 0, $kyw = "")
{
    $conn = connectDTB();
    $sql = "SELECT * FROM product WHERE 1 ";
    if ($iddm > 0) $sql .= " AND id_catalog=" . $iddm;
    if ($kyw != "") $sql .= " AND  name= LIKE '%" . $kyw . "%'";
    $sql .= " order by id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function show_pro($ds)
{
    foreach ($ds as $sp) {
        if ($sp['price'] == 0) {
            $gia = "Đang cập nhập";
        } else {
            if ($sp['sale'] > 0) {
                $gia = '<span class="product_cost">' . $sp['price'] . 'đ</span>
                    <span class="produc_cost-sale">' . $sp['sale'] . 'đ</span>';
            } else {
                $gia = '<span class="product_cost">' . $sp['price'] . 'đ</span>';
            }
        }
        echo '<div class="content_product">
                <form action="../modules/index.php?act=addtocart" method="post">
                    <div class="product_item">
                        <a href="../modules/index.php?act=productdetail&id=' . $sp['id'] . '"><img src="../admin/' . $sp['img'] . '" alt="" class="product_image"></a>
                        <div class="product_select">
                            <div class="product_buy">
                                <i class="icon_cart fa fa-cart-plus" aria-hidden="true"></i>
                                <input type="submit" value="Giỏ hàng" name="addtocart" class="pr_submit">
                            </div>
                        </div>
                    </div>
                    <div class="product_info">
                        <p class="product_name"><a href="../modules/index.php?act=productdetail&id=' . $sp['id'] . '">' . $sp['name'] . '</a></p>
                        ' . $gia . '
                    </div>
                        <input type="hidden" value="' . $sp['id'] . '" name="id">
                        <input type="hidden" value="' . $sp['name'] . '" name="tensp">
                        <input type="hidden" value="' . $sp['img'] . '" name="img">
                        <input type="hidden" value="' . $sp['price'] . '" name="gia">
                        
                </form>
            </div>';
    }
}
