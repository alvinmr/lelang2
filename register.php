<?php
include './db/config.php';

include './admin/template/header.php';

if (!empty($_GET['pesan']))
    if ($_GET['pesan'] == "gagal") {
        echo "<script> alert('ada data yang kosong!'); </script>";
    }
session_start();

if (!empty($_SESSION['username'])) {
    header("location:index.php");
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
        <link rel="stylesheet" href="./admin/template/assets/css/sb-admin-2.min.css">


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    </head>

    <body class="bg-gradient-primary">
        <section class="">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Daftar Masyarakat</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="./modules/auth.php?aksi=register" class="needs-validation"
                                    novalidate="">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                            placeholder="Isi nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="username" class="form-control" name="username"
                                            tabindex="1" required autofocus placeholder="Isi username">
                                        <div class="invalid-feedback">
                                            Please fill in your username
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required placeholder="Isi password">
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_tlp">No Telpon</label>
                                        <input type="number" name="no_tlp" id="no_tlp" class="form-control"
                                            placeholder="Isi nomor telpon">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Daftar
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>