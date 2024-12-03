<div id="main">
    <div class="category">
        <h2>UPDATE SẢN PHẨM</h2>
        <form action="/clothes_shop/admin/index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <select name="iddm" id="">
                <option value="0">Chọn danh mục</option>
                <?php
                $iddm_cur = $getOne[0]['id_catalog'];
                if (isset($dsdm)) {
                    foreach ($dsdm as $idm) {
                        if ($iddm_cur == $idm['id']) {
                            echo '<option value="' . $idm['id'] . '" selected>' . $idm['cat_name'] . '</option>';
                        } else {
                            echo '<option value="' . $idm['id'] . '">' . $idm['cat_name'] . '</option>';
                        }
                    }
                }
                ?>
            </select>
            <input type="file" name="hinh">
            <span><img src="<?= $getOne[0]['img'] ?>" width="80px" alt=""></span>
            <input type="hidden" name="old_img" value="<?= $getOne[0]['img'] ?>">
            <br>
            <input type="text" name="tensp" placeholder="Tên sản phẩm" value="<?= $getOne[0]['name'] ?>">
            <input type="text" name="sale" placeholder="Sale" value="<?= $getOne[0]['sale'] ?>">
            <br>
            <input type="text" name="price" placeholder="Giá" value="<?= $getOne[0]['price'] ?>">
            <br>
            <input type="hidden" name="id" value="<?= $getOne[0]['id'] ?>">
            <input type="submit" name="submit" value="Cập nhập">
        </form>

        <table class="cate_table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Sale</th>
                <th>Hành động</th>
            </tr>
            <?php
            // var_dump($kq);
            ?>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $prod) {
                    echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($prod['name']) . '</td>
                            <td><img src="../admin/' . htmlspecialchars($prod['img']) . '" alt="Hình sản phẩm" width="80"></td>
                            <td>' . htmlspecialchars($prod['price']) . '</td>
                            <td>' . htmlspecialchars($prod['sale']) . '</td>
                            <td><a href="/clothes_shop/admin/index.php?act=updatesp&id=' . $prod['id'] . '">Sửa</a> | <a href="/clothes_shop/admin/index.php?act=deletesp&id=' . $prod['id'] . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>