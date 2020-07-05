<?php

$id_user = $_SESSION['id_user'];
$queryRiwayat = mysqli_query($koneksi, "SELECT * FROM `history_lelang` 
                                        JOIN `tb_barang` ON history_lelang.id_barang = tb_barang.id_barang 
                                        WHERE id_user = $id_user");
$no = 0;
?>

<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="my-4">Riwayat Pasang Harga Mu</h1>
        </div>
        <?php if ($row = mysqli_fetch_array($queryRiwayat)) : ?>
        <div class="col">
            <a href="./modules/riwayat_module.php?aksi=hapus" class="btn btn-warning">Hapus Semua</a>
        </div>
        <?php endif; ?>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang Lelang</th>
                <th>Foto Barang</th>
                <th>Penawaran</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($queryRiwayat)) : ?>
            <?php $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td width="400px"><?= $row['nama_barang'] ?></td>
                <td>
                    <img class="img-fluid" width="80%"
                        src="./admin/template/assets/img/barang/<?= $row['foto_barang'] ?>" alt="">
                </td>
                <td><?= $row['penawaran_harga'] ?> Rp</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>