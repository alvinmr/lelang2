<?php

include '../db/config.php';

switch ($_GET['aksi']) {
    case 'tambah':
        $nama_barang    = $_POST['nama_barang'];
        $tgl            = $_POST['tanggal'];
        $harga_awal     = $_POST['harga_awal'];
        $deskripsi      = $_POST['deskripsi'];
        // Proses Upload Foto
        $tipeFoto = $_FILES['foto']['type'];
        $namaFoto = $_FILES['foto']['name'];
        $ukuranFoto = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $path = "../template/assets/img/barang/" . $namaFoto;

        // Cek tipe nya harus jpeg atau png
        if ($tipeFoto == "image/jpeg" || $tipeFoto == "image/png") {
            // cek ukuran fotonya gaboleh lebih dari 10mb
            if ($ukuranFoto <= 1000000) {
                // cek berhasil apa nggak upload file nya
                if (move_uploaded_file($file_tmp, $path)) {
                    mysqli_query($koneksi, "INSERT INTO `tb_barang`
                    VALUES (
                        null,
                        '$nama_barang',
                        '$tgl',
                        '$harga_awal',
                        '$deskripsi',
                        '$namaFoto'
                        )") or die(mysqli_error($koneksi));
                } else {
                    echo "<script> alert('Maaf, Gambar gagal untuk diupload.'); </script>";
                }
            } else {
                echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB'); </script>";
            }
        } else {
            echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.!'); </script>";
        }
        header('location:../index?page=barang');
        break;

    case 'edit':
        $id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $tgl = $_POST['tanggal'];
        $harga_awal = $_POST['harga_awal'];
        $deskripsi = $_POST['deskripsi'];
        mysqli_query($koneksi, "UPDATE `tb_barang` SET 
                id_barang = $id,
                nama_barang = '$nama_barang',
                tgl = '$tgl',
                harga_awal = '$harga_awal',
                deskripsi_barang = '$deskripsi',
                foto_barang = 'default.jpg'
                WHERE id_barang = $id") or die(mysqli_error($koneksi));
        header('location:../index?page=barang');
        break;

    case 'hapus':
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM `tb_barang` WHERE id_barang = $id");
        $row = mysqli_fetch_array($query);
        $path = "../template/assets/img/barang/" . $row['foto_barang'];
        if (!$row['foto_barang'] == 'default.jpg') {
            unlink(realpath($path));
        }
        mysqli_query($koneksi, "DELETE FROM `tb_barang` WHERE id_barang = $id");
        header('location:../index?page=barang');
        break;

    default:
        header('location:../index.php');
        break;
}