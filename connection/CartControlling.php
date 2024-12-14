<?php
function getcartDetail($id)
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT c.tensp AS tensp,
            c.soluong AS soluong,
            c.img AS img
            FROM `cart` c
            WHERE c.iddh=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getAllCart()
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT
            o.id As id,
            o.madh AS madh,
            o.tongdonhang AS tongdonhang,
            o.ttdh AS ttdh,
            o.name AS name,
            o.address AS address,
            o.email AS email,
            o.tel AS tel,
            SUM(c.soluong) As soluong,
            c.tensp AS tensp,
            c.img AS img
        FROM `order` o JOIN `cart` c ON o.id = c.iddh
        GROUP BY o.id
        ORDER BY o.id DESC ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function cartstatus($n)
{
    switch ($n) {
        case 0:
            $tt = "Đơn hàng mới";
            break;
        case 1:
            $tt = "Đang xử lý";
            break;
        case 2:
            $tt = "Đang giao hàng";
            break;
        case 3:
            $tt = "Hoàn tất";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function getOnecart($id)
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE id=$id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function updatedh($id, $madh, $ttdh)
{
    $conn = connectDTB();
    $sql = "UPDATE `order` SET madh='" . $madh . "', ttdh='" . $ttdh . "' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function deletdh($id)
{
    $conn = connectDTB();
    $sql = "DELETE FROM `order` WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
