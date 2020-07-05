<?php
if ($_SESSION['level'] != 'petugas' || empty($_SESSION)) header('location:index'); //Selain petugas gabisa akses halaman


$queryLelang = mysqli_query($koneksi, "SELECT *  FROM tb_lelang 
                                        JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
                                        JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas");
$queryBarang = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga_awal FROM `tb_barang`");
$no = 0;
?>


<section class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Lelang</h1>
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
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($queryLelang)) : ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['tgl_lelang'] ?></td>
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
                            <?php while ($rowBarang = mysqli_fetch_array($queryBarang)) : ?>
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