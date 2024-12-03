<div id="main">
    <div class="category">
        <h2>DANH MỤC</h2>
        <form action="/clothes_shop/admin/index.php?act=adddm" method="post">
            <input type="text" name="tendm">
            <input type="submit" name="themmoi" value="Thêm mới">
        </form>
        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Ưu tiên</th>
                <th>Hiển thị</th>
                <th>Hành động</th>
            </tr>
            <?php
            // var_dump($kq);
            ?>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $dm['cat_name'] . '</td>
                            <td>' . $dm['priority'] . '</td>
                            <td>' . $dm['display'] . '</td>
                            <td><a href="/clothes_shop/admin/index.php?act=updatedmform&id=' . $dm['id'] . '">Sửa</a> | <a href="/clothes_shop/admin/index.php?act=delete&id=' . $dm['id'] . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>