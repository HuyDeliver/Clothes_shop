<?php

/**
 * Kiểm tra xem username có tồn tại không
 */
function isUsernameExists($username)
{
    $conn = connectDTB();

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE user = :user");
        $stmt->bindParam(':user', $username);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Trả về true nếu tồn tại
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/**
 * Thêm user mới vào database
 */
function addUser($username, $password, $role = 0)
{
    $conn = connectDTB();

    try {
        $stmt = $conn->prepare("INSERT INTO users (user, password, role) VALUES (:user, :password, :role)");
        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $userId = $conn->lastInsertId(); // Lấy ID vừa được tạo ra
        return $userId;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
