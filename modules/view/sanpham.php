<div id="header_insert">
    <?php include '../includes/header.php'; ?>
</div>

<div id="content">
    <hr>
    <h3 class="content_subheading">tất cả sản phẩm</h3>
    <div class="content_shop">
        <?php
        show_pro($sphome2);
        ?>
    </div>
    <div class="content_page">
        <a href="../index.php?act=one&page=1">1</a>
        <a href="../index.php?act=two&page=2">2</a>
    </div>

</div>
<div id="footer_insert">
    <?php include '../includes/footer.php'; ?>
</div>
<script src="../assets/js/trangchu.js?v=<?= time(); ?>"></script>
</body>