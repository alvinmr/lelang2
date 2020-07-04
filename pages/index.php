<div class="container">
    <div class="greeting mt-4">
        <?php if (!empty($_SESSION)) { ?>
        <h1>Hallo, <?= $_SESSION['nama_lengkap'] ?></h1>
        <?php }else { ?>
        <h1>Yuk, masuk dulu untuk ikut lelang!</h1>
        <? } ?>
    </div>
</div>