<?php

if (!$_SESSION) header('location:index.php');


$data = mysqli_query($koneksi, "SELECT * FROM `tb_barang`");
?>


<section class="section">
    <div class="section-header">
        <h1>Registrasi Petugas</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Harga Awal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) : ?>
                        <tr>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['tgl'] ?></td>
                            <td><?= $row['harga_awal'] ?></td>
                            <td><?= $row['deskripsi_barang'] ?></td>
                            <td>
                                <a href="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>