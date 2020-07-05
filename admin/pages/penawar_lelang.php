<?php

if (!$_SESSION) header('location:index.php');
if ($_SESSION['level'] != 'petugas' || empty($_SESSION['level'])) header('location:index.php'); //Selain petugas gabisa akses halaman


$queryPenawarLelang = mysqli_query($koneksi, "SELECT *  FROM tb_lelang 
                                                JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
                                                JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas 
                                                JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user");
$dataBarang = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga_awal FROM `tb_barang`");
$no = 0;
?>


<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penawara Lelang</h1>
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
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($queryPenawarLelang)) : ?>
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
                <h5 class="modal-title" id="tambahModalLabel">Buat Lelang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./modules/lelang_module?aksi=tambah" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control" name="nama_barang" id="nama_barang">
                            <?php while ($rowBarang = mysqli_fetch_array($dataBarang)) : ?>
                            <option value="<?= $rowBarang['id_barang'] ?>"><?= $rowBarang['nama_barang'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lelang">Tanggal Lelang</label>
                        <input type="date" name="tanggal_lelang" id="tanggal_lelang" class="form-control"">
                    </div>                    
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->