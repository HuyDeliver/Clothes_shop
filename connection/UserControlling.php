<?php
function addtk($user, $email, $pass, $role)
{
    $conn = connectDTB();
    $sql = "INSERT INTO users (user, email, password, role)
    VALUES ('" . $user . "', '" . $email . "', '" . $pass . "', '" . $role . "' )";
    $conn->exec($sql);
}

function deletetk($id)
{
    $conn = connectDTB();
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->exec($sql);
}

function updatetk($id, $user, $email, $pass, $role)
{
    $conn = connectDTB();
    $sql = "UPDATE users SET user='" . $user . "', email= '" . $email . "', password= '" . $pass . "', role= '" . $role . "' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function takeOne($id)
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getAllUser()
{
    $conn = connectDTB();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
