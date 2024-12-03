<?php

function adddm($cat_name)
{
    $conn = connectDTB();
    $sql = "INSERT INTO catalog (cat_name)
    VALUES ('" . $cat_name . "')";
    $conn->exec($sql);
}

function updatedm($id, $cat_name)
{
    $conn = connectDTB();
    $sql = "UPDATE catalog SET cat_name='" . $cat_name . "' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function getOnedm($id)
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM catalog WHERE id=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function delete($id)
{
    $conn = connectDTB();
    $sql = "DELETE FROM catalog WHERE id=$id";

    // use exec() because no results are returned
    $conn->exec($sql);
}

function getAll_catalog()
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM catalog");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
