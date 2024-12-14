<div id="main">
    <div class="category">
        <h2>SẢN PHẨM</h2>
        <form action="../admin/index.php?act=addsp" method="post" enctype="multipart/form-data">
            <select name="iddm" id="">
                <option value="0">Chọn danh mục</option>
                <?php
                if (isset($dsdm)) {
                    foreach ($dsdm as $idm) {
                        echo '<option value="' . $idm['id'] . '">' . $idm['cat_name'] . '</option>';
                    }
                }
                ?>
            </select>
            <input type="file" name="hinh">
            <br>
            <input type="text" name="tensp" placeholder="Tên sản phẩm">
            <input type="text" name="sale" placeholder="Sale">
            <br>
            <input type="text" name="price" placeholder="Giá">
            <br>
            <input type="submit" name="themmoi" value="Thêm mới">
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
                            <td><a href="../admin/index.php?act=updatesp&id=' . $prod['id'] . '">Sửa</a> | <a href="../admin/index.php?act=deletesp&id=' . $prod['id'] . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</div>