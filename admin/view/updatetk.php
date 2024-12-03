<div id="main">
    <div class="category">
        <h2>TÀI KHOẢN</h2>
        <form action="/clothes_shop/admin/index.php?act=updatetk" method="post">
            <input type="text" name="tentk" value="<?= $takeone[0]['user'] ?>">

            <input type="email" name="email" value="<?= $takeone[0]['email'] ?>">
            <br>
            <input type="text" name="pass" value="<?= $takeone[0]['password'] ?>">

            <input type="number" name="role" min="0" max="1" value="<?= $takeone[0]['role'] ?>">
            <br>
            <input type="hidden" name="id" value="<?= $takeone[0]['id'] ?>">
            <input type="submit" name="capnhap" value="Cập nhập">
        </form>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Hành động</th>
            </tr>
            <?php
            // var_dump($kq);
            ?>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $user) {
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $user['user'] . '</td>
                            <td>' . $user['email'] . '</td>
                            <td>' . $user['password'] . '</td>
                            <td>' . $user['role'] . '</td>
                            <td><a href="/clothes_shop/admin/index.php?act=updatetk&id=' . $user['id'] . '">Sửa</a> | <a href="/clothes_shop/admin/index.php?act=deletetk&id=' . $user['id'] . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>