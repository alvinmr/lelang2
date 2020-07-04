<?php

include '../db/config.php';

session_start();

switch ($_GET['aksi']) {
    case 'bid':
        $idUser = $_SESSION['id_user'];
        $idLelang = $_POST['id_lelang'];
        $idBarang = $_POST['id_barang'];
        $bid = $_POST['bid'];
        $hargaSekarang = $_POST['harga_akhir'];

        if ($bid <= $hargaSekarang) {
            header("location:../index.php?pesan=gagal");
        } else {
            mysqli_query($koneksi, "INSERT INTO `history_lelang` VALUES(
                null,
                '$idLelang',
                '$idBarang',
                '$idUser',
                '$bid'
            )");
            mysqli_query($koneksi, "UPDATE `tb_lelang` SET harga_akhir = $bid, id_user = $idUser WHERE id_lelang = $idLelang");
            header("location:../index.php");
        }
        break;

    default:
        header("location:../index.php");
        break;
}