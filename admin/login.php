<?php
include '../db/config.php';

include './template/header.php';


if (!empty($_GET['pesan']))
    if ($_GET['pesan'] == "gagal") {
        echo "<script> alert('username atau password salah!'); </script>";
    } elseif ($_GET['pesan'] == "logout") {
        echo "<script> alert ('Anda telah logout'); </script>";
    } elseif ($_GET['pesan'] == "belum_login") {
        echo "<script> alert ('Anda harus login untuk mengakses halaman admin'); </script>";
    }
session_start();

if (!empty($_SESSION['level'])) {
    header("location:index.php");
}
?>

<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="./template/assets/img/stisla-fill.svg" alt="logo" width="100"
                        class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="./modules/auth.php" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1"
                                    required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './template/footer.php'; ?>