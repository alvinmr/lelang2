<?php

if (!$_SESSION) header('location:index.php');
if ($_SESSION['level'] != 'admin' || empty($_SESSION['level'])) header('location:index.php'); //Selain admin gabisa akses halaman


$queryPetugas = mysqli_query($koneksi, "SELECT * FROM `tb_petugas` WHERE level = 'petugas'");
$no = 0;
?>


<section class="section">
    <div class="section-header">
        <h1>Registrasi Petugas</h1>
    </div>
    <div class="section-body">
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahModal">
            <i class="fas fa-plus"></i>
            Tambah
        </button>
        <div class="card">
            <div class="card-body">
                <table id="table" class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($queryPetugas)) : ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_petugas'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td>
                                <a href="./modules/regispetugas_module?aksi=hapus&id=<?= $row['id_petugas'] ?>"
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

<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./modules/regispetugas_module?aksi=tambah" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control"
                            placeholder="Masukan nama petugas">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Masukan username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukan password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->