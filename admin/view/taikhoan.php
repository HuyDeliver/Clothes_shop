<div id="main">
    <div class="category">
        <h2>TÀI KHOẢN</h2>
        <form action="/clothes_shop/admin/index.php?act=addtk" method="post">
            <input type="text" name="tentk" placeholder="Tên tài khoản">

            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="text" name="pass" placeholder="Password">

            <input type="number" min="0" max="1" name="role" placeholder="Role">
            <br>
            <input type="submit" name="themmoi" value="Thêm mới">
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
                foreach ($kq as $us) {
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $us['user'] . '</td>
                            <td>' . $us['email'] . '</td>
                            <td>' . $us['password'] . '</td>
                            <td>' . $us['role'] . '</td>
                            <td><a href="/clothes_shop/admin/index.php?act=updatetk&id=' . $us['id'] . '">Sửa</a> | <a href="/clothes_shop/admin/index.php?act=deletetk&id=' . $us['id'] . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>