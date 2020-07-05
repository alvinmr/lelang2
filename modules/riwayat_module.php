<?php

session_start();
include '../db/config.php';

switch ($_GET['aksi']) {
    case 'hapus':
        $id_user = $_SESSION['id_user'];
        mysqli_query($koneksi, "DELETE FROM `history_lelang` WHERE id_user = $id_user");
        header("location:../index.php");
        break;

    default:
        header("location:../index.php");
        break;
}