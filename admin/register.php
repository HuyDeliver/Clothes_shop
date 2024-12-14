<?php
session_start();
include '../connection/AddUser.php';
include '../connection/connect_dtb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);
    $confirmPassword = trim($_POST['confirmpass']);

    if (!empty($username) && !empty($password)) {
        if ($password === $confirmPassword) {
            if (isUsernameExists($username)) {
                echo "<script>alert('Tên người dùng đã tồn tại!');</script>";
            } else {
                if (addUser($username, $password)) {
                    header('Location: login.php'); // Chuyển sang trang đăng nhập
                    exit();
                } else {
                    echo "<script>alert('Đã xảy ra lỗi khi thêm người dùng!');</script>";
                }
            }
        } else {
            echo "<script>alert('Mật khẩu xác nhận không khớp!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup/Login Modal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../modules/assets/font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../modules/assets/css/register.css?v=<?= time(); ?>">
    <style>
    </style>
</head>

<body>
    <!-- Modal -->
    <div id="loginModal" class="modal">
        <form class="modal-sign_up" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="container">
                <h1>Sign Up</h1>
                <p class="form_note">Please fill in this form to create an account.</p>
                <hr>
                <div class="enter_form">
                    <label for="user">
                        <p>Username</p>
                    </label>
                    <input type="text" placeholder="Username" name="user" id="user" required>
                </div>
                <div class="enter_form">
                    <label for="email">
                        <p>Email</p>
                    </label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" required>
                </div>
                <div class="enter_form">
                    <label for="pass">
                        <p>Password</p>
                    </label>
                    <input type="password" placeholder="Enter Password" name="pass" required>
                </div>
                <div class="enter_form">
                    <label for="confirmpass">
                        <p>Confirm Password</p>
                    </label>
                    <input type="password" placeholder="Enter Password" name="confirmpass" required>
                </div>
                <div class="clearfix">
                    <button type="button" class="cancelbtn" id="cancelBtn">Cancel</button>
                    <button type="submit" name="register" class="signupbtn">Signup</button>
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