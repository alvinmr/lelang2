<?php
if (empty($_SESSION['level'])) header('location:index.php'); //Selain petugas / admin gabisa akses halaman

// Hitung Barang
$dataBarang = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_barang`");
$barang = mysqli_fetch_row($dataBarang);
// Hitung Lelang
$dataLelang = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_lelang` WHERE status = 'dibuka'");
$lelang = mysqli_fetch_row($dataLelang);
// Hitung Masyarakat
$dataMasyarakat = mysqli_query($koneksi, "SELECT COUNT(*) FROM `tb_masyarakat`");
$masyarakat = mysqli_fetch_row($dataMasyarakat);

?>
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $barang['0'] ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Lelang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $lelang['0'] ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Masyarakat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $masyarakat['0'] ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>