<?php

include './db/config.php';

session_start();

if (!empty($_GET['pesan'])) {
    if ($_GET['pesan'] == 'gagal') echo "<script> alert('bid kamu kurang tinggi'); </script>";
}

?>

<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Aplikasi Lelang</title>

        <!-- Bootstrap CSS -->
        <link href="./admin/template/assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="./admin/template/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Aplikasi Lelang</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link <?= $_GET['page'] == '' ? 'active' : '' ?>" href="./">Beranda</a>
                        <?php if (empty($_SESSION['username'])) { ?>
                        <a href="login.php" class="btn btn-primary mx-4">Masuk</a>
                        <a href="register.php" class="btn btn-secondary">Daftar</a>
                        <?php } else { ?>
                        <a class="nav-item nav-link <?= $_GET['page'] == 'riwayat' ? 'active' : '' ?>"
                            href="?page=riwayat">Riwayat</a>
                        <a href="./modules/auth.php?aksi=logout" class="btn btn-light">Logout</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <?php if (empty($_GET['page'])) {
        include './pages/index.php';
    } else {
        include './pages/' . $_GET['page'] . '.php';
    }  ?>
        <!-- End Content -->


        <!-- Footer -->
        <footer>
            <div class="container my-4 text-center">
                Copyright milik tuhan
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="./admin/template/assets/vendor/jquery/jquery.slim.min.js">
        </script>
        <script src="./admin/template/assets/vendor/bootstrap/js/bootstrap.min.js">
        </script>
    </body>

</html>