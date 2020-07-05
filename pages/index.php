<?php 

$queryLelang = mysqli_query($koneksi, "SELECT *  FROM tb_lelang 
                                        JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
                                        JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas");

?>

<div class="container">
    <div class="greeting mt-4">
        <?php if (!empty($_SESSION)) { ?>
        <h1>Hallo, <?= $_SESSION['nama_lengkap'] ?></h1>
        <!-- Content -->
        <div class="content">
            <h1>Ini barang lelang dari kami</h1>
            <div class="row">
                <?php while($row = mysqli_fetch_array($queryLelang)): ?>
                <div class="col-4 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="./admin/template/assets/img/barang/<?= $row['foto_barang'] ?>"
                            alt="">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto mt-2">
                                    <h2 class="card-title"><?= $row['nama_barang'] ?></h2>
                                </div>
                                <div class="col">
                                    <span class="badge badge-success"><?= $row['status'] ?></span>
                                </div>
                            </div>
                            <p class="card-text"><?= $row['deskripsi_barang'] ?></p>

                            <p class="card-text"><?= $row['status'] == 'dibuka' ? 'Harga Sementara' : 'Harga Akhir' ?> :
                                <?= $row['harga_akhir'] ?> Rp</p>
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <form action="./modules/index_module.php?aksi=bid" method="post">
                                            <input type="hidden" name="id_lelang" value="<?= $row['id_lelang'] ?>">
                                            <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                                            <input type="hidden" name="harga_akhir" value="<?= $row['harga_akhir'] ?>">
                                            <input type="text" name="bid" class="form-control"
                                                placeholder="Masukkan bid mu" aria-describedby="helpId">
                                            <small id="helpId" class="text-danger">Bid lebih tinggi dari harga</small>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <button class="btn btn-primary circle" type="submit"><i
                                                class="fas fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php }else { ?>
        <h1>Yuk, masuk dulu untuk ikut lelang!</h1>
        <? } ?>
    </div>

</div>