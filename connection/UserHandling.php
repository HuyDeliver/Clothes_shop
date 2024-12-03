<?php


function checkUser($user, $pass)
{
    $conn = connectDTB();

    try {
        $stmt = $conn->prepare("SELECT role, password FROM users WHERE user = :user");
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            // Nếu mật khẩu không mã hóa:
            if ($result['password'] === $pass) {
                return $result['role']; // Trả về role nếu hợp lệ
            }
        }
        return false; // Không tìm thấy hoặc sai mật khẩu
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
