<?php

include '../../db/config.php';

switch ($_GET['aksi']) {

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