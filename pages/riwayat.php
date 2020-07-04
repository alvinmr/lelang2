<?php

$id_user = $_SESSION['id_user'];
$queryRiwayat = mysqli_query($koneksi, "SELECT * FROM `history_lelang` JOIN `tb_barang` ON history_lelang.id_barang = tb_barang.id_barang WHERE id_user = $id_user");
$no = 0;
?>

<div class="container">
    <h1 class="my-4">Riwayat Pasang Harga Mu</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang Lelang</th>
                <th>Penawaran</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($queryRiwayat)) : ?>
            <?php $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['penawaran_harga'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>