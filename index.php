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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
    </body>

</html>