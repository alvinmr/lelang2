<?php

if (!$_SESSION) header('location:index.php');
if ($_SESSION['level'] != 'petugas') header('location:index.php');


$data = mysqli_query($koneksi, "SELECT `id_lelang`, `nama_barang`, `tgl_lelang`, `harga_akhir`, `nama_lengkap`, `nama_petugas`, `status`  
                        FROM tb_lelang JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
                        JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas 
                        JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user");
$dataBarang = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga_awal FROM `tb_barang`");
$dataMasyarakat = mysqli_query($koneksi, "SELECT id_user, nama_lengkap FROM `tb_masyarakat`");
$dataPetugas = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM `tb_petugas`");
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
                    <input type="hidden" name="harga_akhir" value="<?= $rowBarang['harga_awal'] ?>"
                        class="form-control">
                    <input type="hidden" name="petugas" value="<?= $_SESSION['nama_lengkap'] ?>" class="form-control">
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