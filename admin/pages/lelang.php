<?php

if (!$_SESSION) header('location:index.php');
if ($_SESSION['level'] != 'petugas') header('location:index.php');


$data = mysqli_query($koneksi, "SELECT `id_lelang`, `nama_barang`, `tgl_lelang`, `harga_akhir`, `nama_lengkap`, `nama_petugas`, `status`  
                        FROM tb_lelang JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
                        JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas 
                        JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user");
$no = 0;
?>


<section class="section">
    <div class="section-header">
        <h1>List Lelang</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Harga Akhir</th>
                        <th>Masyarakat</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) : ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['tgl_lelang'] ?></td>
                            <td><?= $row['harga_akhir'] ?></td>
                            <td><?= $row['nama_lengkap'] ?></td>
                            <td><?= $row['nama_petugas'] ?></td>
                            <td>
                                <span
                                    class="badge <?= $row['status'] == 'dibuka' ? 'badge-success' : 'badge-warning' ?> "><?= $row['status'] ?></span>
                            </td>
                            <td>
                                <?php if ($row['status'] == 'dibuka') { ?>
                                <a href="./modules/lelang_module?aksi=tutup&id=<?= $row['id_lelang'] ?>"
                                    class="btn btn-warning">Tutup</a>
                                <? } else{ ?>
                                <a href="./modules/lelang_module?aksi=buka&id=<?= $row['id_lelang'] ?>"
                                    class="btn btn-success">Buka</a>
                                <?php } ?>

                                <a href="./modules/lelang_module?aksi=hapus&id=<?= $row['id_lelang'] ?>"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>