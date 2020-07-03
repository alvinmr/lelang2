<?php

if (!$_SESSION) header('location:index.php');


$data = mysqli_query($koneksi, "SELECT * FROM `tb_barang`");
$no = 0;
?>


<section class="section">
    <div class="section-header">
        <h1>Data Barang</h1>
    </div>
    <div class="section-body">
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahModal">
            <i class="fas fa-plus"></i>
            Tambah
        </button>
        <div class="card">
            <div class="card-body">
                <table id="table" class="table text-center">
                    <thead>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Harga Awal</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) : ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['tgl'] ?></td>
                            <td><?= $row['harga_awal'] ?></td>
                            <td><?= $row['deskripsi_barang'] ?></td>
                            <td>
                                <img src="./template/assets/img/barang/<?= $row['foto_barang'] ?>" class="img-thumbnail"
                                    width="30%">
                            </td>
                            <td>
                                <a href="./modules/barang_module?aksi=hapus&id=<?= $row['id_barang'] ?>"
                                    class="btn btn-danger">Hapus</a>
                                <a href="" data-toggle="modal" data-target="#editModal<?= $row['id_barang'] ?>"
                                    class="btn btn-warning">Edit</a>
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
                <form action="./modules/barang_module?aksi=tambah" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                            placeholder="Masukan nama barang">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="number" name="harga_awal" id="harga_awal" class="form-control"
                            placeholder="Masukan harga awal">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" cols="30"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" name="foto">
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

<!-- Modal Edit-->
<?php $data = mysqli_query($koneksi, "SELECT * FROM `tb_barang`"); ?>
<?php while ($row = mysqli_fetch_array($data)) : ?>
<div class="modal fade" id="editModal<?= $row['id_barang'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./modules/barang_module?aksi=edit" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="hidden" value="<?= $row['id_barang'] ?>" name="id">
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                            placeholder="Masukan nama barang" value="<?= $row['nama_barang'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $row['tgl'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="number" name="harga_awal" id="harga_awal" class="form-control"
                            placeholder="Masukan harga awal" value="<?= $row['harga_awal'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            cols="30"><?= $row['deskripsi_barang'] ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" name="foto" id="foto"
                                    placeholder="Pilih foto">
                            </div>
                        </div>
                        <div class="col-6">
                            <p>Gambar Sebelumnya :</p>
                            <img src="./template/assets/img/barang/<?= $row['foto_barang'] ?>" class="img-thumbnail"
                                width="70%">
                        </div>
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
<?php endwhile; ?>
<!-- End Modal Edit -->