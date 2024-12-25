<?php
function taodonhang($madh, $tongdonhang, $name, $address, $email, $tel, $pttt, $userid)
{
    $conn = connectDTB(); // Kết nối database
    $sql = "INSERT INTO `order` (madh,tongdonhang,pttt,iduser,name,address,email,tel) 
            VALUES (:madh, :tongdonhang, :pttt,:iduser,:name, :address, :email, :tel)";
    $stmt = $conn->prepare($sql);

    // Ràng buộc tham số với giá trị
    $stmt->bindParam(':madh', $madh);
    $stmt->bindParam(':tongdonhang', $tongdonhang);
    $stmt->bindParam(':pttt', $pttt);
    $stmt->bindParam(':iduser', $userid);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address); // Đúng tên tham số
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->execute();
    $last_id = $conn->lastInsertId(); //tạo đơn hàng xog thì trả về id đơn hàng
    return $last_id;
}
function addtocart($iddh, $idpro, $tensp, $img, $dongia, $soluong)
{
    $conn = connectDTB(); // Kết nối database
    $sql = "INSERT INTO cart (iddh,idpro,soluong,dongia,tensp,img) 
            VALUES (:iddh, :idpro, :soluong, :dongia, :tensp, :img)";
    $stmt = $conn->prepare($sql);

    // Ràng buộc tham số với giá trị
    $stmt->bindParam(':iddh', $iddh);
    $stmt->bindParam(':idpro', $idpro);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->bindParam(':dongia', $dongia);
    $stmt->bindParam(':tensp', $tensp);
    $stmt->bindParam(':img', $img); // Đúng tên tham số
    $stmt->execute();
}
function showcart($iddh)
{
    $conn = connectDTB();
    $sql = "SELECT * FROM cart WHERE iddh = :iddh";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iddh', $iddh);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getorderInfo($iddh)
{
    $conn = connectDTB();
    $sql = "SELECT * FROM `order` WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $iddh);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
