<?php
session_start();
ob_start();
include '../connection/UserHandling.php'; // Import hàm checkUser
include '../connection/connect_dtb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    if (!empty($user) && !empty($pass)) {
        $userData = checkUser($user, $pass); // Gọi hàm kiểm tra tài khoản
        if ($userData['role'] !== false) {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $userData['role'];
            $_SESSION['userId'] = $userData['userId']; // Lưu role vào session
            if ($userData['role'] == 1) { // Tài khoản admin
                header('Location: ../admin/index.php');
                exit();
            } elseif ($userData['role'] == 0) { // Tài khoản người dùng
                echo "<script>alert('Bạn đã đăng nhập thành công!');</script>";
                header('Location: ../modules/index.php?act=trangchu');
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../modules/assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../modules/assets/css/login.css?v=<?= time(); ?>">
    <style>

    </style>
</head>

<body>
    <div id="loginModal" class="modal">
        <form class="modal-log_in" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="container">
                <h1>LOGIN</h1>
                <p class="form_note">Please fill in this form to log in </p>
                <hr>

                <div class="enter_form">
                    <label for="user">
                        <p>Username</p>
                    </label>
                    <input type="text" placeholder="Enter user_name" name="user" id="user" required>
                </div>

                <div class="enter_form">
                    <label for="pass">
                        <p>Password</p>
                    </label>
                    <input type="password" placeholder="Enter password" name="pass" required>
                </div>

                <div class="enter_check">
                    <input type="checkbox" checked="checked" name="remember">
                    <label for="remember">
                        <p>Remember me</p>
                    </label>
                </div>

                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" name="login" class="signupbtn">Login</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);
        const cancelBtn = $('.cancelbtn');
        cancelBtn.onclick = function() {
            window.location.href = '../modules/index.php?act=trangchu';
        }
    </script>

</body>

</html>