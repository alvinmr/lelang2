<?php

include '../../db/config.php';

switch ($_GET['aksi']) {
    case 'tambah':
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        mysqli_query($koneksi, "INSERT INTO `tb_petugas` VALUES (
            null,
            '$nama_petugas',
            '$username',
            '$password',
            'petugas'
        )");
        header('location:../index?page=regis_petugas');
        break;

    case 'hapus':
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM `tb_petugas` WHERE id_petugas = $id");
        header('location:../index?page=regis_petugas');
        break;

    default:
        header('location:../index.php');
        break;
}