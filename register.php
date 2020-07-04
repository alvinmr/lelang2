<?php
include './db/config.php';

include './admin/template/header.php';

session_start();

if (!empty($_SESSION['username'])) {
    header("location:index.php");
}
?>

<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
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
                                <input id="username" type="username" class="form-control" name="username" tabindex="1"
                                    required autofocus placeholder="Isi username">
                                <div class="invalid-feedback">
                                    Please fill in your username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    required placeholder="Isi password">
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

<?php include './admin/template/footer.php'; ?>