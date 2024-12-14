<?php
session_start();
session_unset(); // Xóa tất cả các biến session
header('Location: ../modules/index.php?act=trangchu');
exit();
