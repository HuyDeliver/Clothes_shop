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


function getAll_prod()
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
