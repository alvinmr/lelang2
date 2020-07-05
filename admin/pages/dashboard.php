<?php
if (empty($_SESSION['level'])) header('location:index.php'); //Selain petugas / admin gabisa akses halaman

// Hitung Barang
$queryBarang = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_barang`");
$barang = mysqli_fetch_row($queryBarang);
// Hitung Lelang
$queryLelang = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_lelang` WHERE status = 'dibuka'");
$lelang = mysqli_fetch_row($queryLelang);
// Hitung Masyarakat
$queryMasyarakat = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_masyarakat`");
$masyarakat = mysqli_fetch_row($queryMasyarakat);

?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard <?= $_SESSION['level'] ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Barang</h4>
                    </div>
                    <div class="card-body">
                        <?= $barang['0'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Lelang Aktif</h4>
                    </div>
                    <div class="card-body">
                        <?= $lelang['0'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Masyarakat</h4>
                    </div>
                    <div class="card-body">
                        <?= $masyarakat['0'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>