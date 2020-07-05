<?php
session_start();
include '../../db/config.php';


switch ($_GET['aksi']) {
    case 'login':
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "SELECT * FROM `tb_petugas` WHERE `username` = '$username' AND `password` = '$password'");

        $fetch = mysqli_fetch_array($data);


        if (mysqli_num_rows($data) <= 0) {
            header('location:../login.php?pesan=gagal');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['id_petugas'] = $fetch['id_petugas'];;
            $_SESSION['nama'] = $fetch['nama_petugas'];
            $_SESSION['level'] = $fetch['level'];
            header('location:../index');
        }
        break;

    case 'logout':
        //mengaktifkan session_start
        session_start();

        //menghapus semus session_start
        session_destroy();

        //mengalihkan halaman sambil mengirim pesan logout
        header("location:../login.php?pesan=logout");
        break;

    default:
        header('location:../login.php');
        break;
}