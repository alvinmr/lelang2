<?php
session_start();
include '../../db/config.php';


switch ($_GET['aksi']) {
    case 'login':
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $data = mysqli_query($koneksi, "SELECT * FROM `tb_petugas` WHERE `username` = '$username' AND `password` = '$password'");
        $petugas = mysqli_fetch_array($data);


        if (mysqli_num_rows($data) <= 0) {
            header('location:../login.php?pesan=gagal');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['id_petugas'] = $petugas['id_petugas'];;
            $_SESSION['nama'] = $petugas['nama_petugas'];
            $_SESSION['level'] = $petugas['level'];
            header('location:../index');
        }
        break;

    case 'logout':
        session_start();
        session_destroy();
        header("location:../login.php?pesan=logout");
        break;

    default:
        header('location:../login.php');
        break;
}