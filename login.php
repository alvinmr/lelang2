<?php
include './db/config.php';

include './admin/template/header.php';


if (!empty($_GET['pesan']))
    if ($_GET['pesan'] == "berhasil") {
        echo "<script> alert('user berhasil dibuat!'); </script>";
    } 
    elseif ($_GET['pesan'] == "gagal") {
        echo "<script> alert('password atau username salah!'); </script>";
    } 
session_start();

if (!empty($_SESSION['level'])) {
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

    <body class=" bg-gradient-primary">
        <div class="container ">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12 d-none d-lg-block"></div>
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login yu!</h1>
                                        </div>
                                        <form class="user" method="POST" action="./modules/auth.php?aksi=login">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                    placeholder="Masukkan username...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="password" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </body>