<?php

include '../db/config.php';

switch ($_GET['aksi']) {
    case 'tambah':
        $nama_barang = $_POST['nama_barang'];
        $harga_akhir = $_POST['harga_akhir'];
        $petugas = $_POST['petugas'];
        $waktuSekarang = date('Y-m-d', time());
        mysqli_query($koneksi, "INSERT INTO `tb_lelang` VALUES(
            null,
            '$nama_barang',
            '$waktuSekarang',
            '$harga_akhir',
            null,
            '$petugas',
            'dibuka'
        )") or die(mysqli_error($koneksi));

        break;

    case 'buka':
        $id = $_GET['id'];
        mysqli_query($koneksi, "UPDATE `tb_lelang` SET `status` = 'dibuka' WHERE id_lelang = $id");
        header('location:../index?page=lelang');

        break;

    case 'tutup':
        $id = $_GET['id'];
        mysqli_query($koneksi, "UPDATE `tb_lelang` SET `status` = 'ditutup' WHERE id_lelang = $id");
        header('location:../index?page=lelang');
        break;

    case 'hapus':
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM `tb_lelang` WHERE id_lelang = $id");
        header('location:../index?page=lelang');
        break;

    default:
        header('location:../index.php');
        break;
}