<?php
session_start();
include '../db/config.php';

switch ($_GET['aksi']) {
    case 'login':
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "SELECT * FROM `tb_masyarakat` WHERE `username` = '$username' AND `password` = '$password'");

        $fetch = mysqli_fetch_array($data);


        if (mysqli_num_rows($data) <= 0) {
            header('location:../login.php?pesan=gagal');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['id_user'] = $fetch['id_user'];
            $_SESSION['nama_lengkap'] = $fetch['nama_lengkap'];
            header('location:../index.php');
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

    case 'register':
        $nama_lengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $no_tlp = $_POST['no_tlp'];

        if($nama_lengkap && $username && $password && $no_tlp){
        mysqli_query($koneksi, "INSERT INTO `tb_masyarakat` VALUES (
            null,
            '$nama_lengkap',
            '$username',
            '$password',
            '$no_tlp'
        )") or die(mysqli_error($koneksi));
        header("location:../login.php?pesan=berhasil");
        }else{
        header("location:../register.php?pesan=gagal");
        }
        break;

    default:
        header("location:../index.php");
        break;
}