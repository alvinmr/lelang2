<?php

include '../../db/config.php';

session_start();

switch ($_GET['aksi']) {

    case 'tambah':
        $id_barang = $_POST['nama_barang'];
        $tgl_lelang = $_POST['tanggal_lelang'];
        $id_petugas = $_SESSION['id_petugas'];
        mysqli_query($koneksi, "INSERT INTO `tb_lelang` VALUES(
            null,
            '$id_barang',
            '$tgl_lelang',
            null,
            null,
            '$id_petugas',
            'dibuka'
        )") or die(mysqli_error($koneksi));
        header('location:../index?page=lelang');
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