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
                                    <form class="user" method="POST" action="./modules/auth?aksi=login">
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

<?php include './template/footer.php'; ?>