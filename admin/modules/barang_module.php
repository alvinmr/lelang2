<?php

include '../../db/config.php';

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
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $path = "../template/assets/img/barang/" . $namaFoto;

        if ($tipeFoto == "image/jpeg" || $tipeFoto == "image/png") { // Cek tipe nya harus jpeg atau png            
            if ($ukuranFoto <= 1000000) { // cek ukuran fotonya gaboleh lebih dari 10mb
                if (move_uploaded_file($foto_tmp, $path)) { // cek berhasil apa nggak upload file nya
                    mysqli_query($koneksi, "INSERT INTO `tb_barang`
                    VALUES (
                        null,
                        '$nama_barang',
                        '$tgl',
                        '$harga_awal',
                        '$deskripsi',
                        '$namaFoto'
                        )");
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
        // Proses Ganti Foto
        $tipeFoto = $_FILES['foto']['type'];
        $namaFoto = $_FILES['foto']['name'];
        $ukuranFoto = $_FILES['foto']['size'];
        $foto_tmp = $_FILES['foto']['tmp_name']; // foto_tmp berfungsi nyimpan gambar secara sementara lalu di upload
        $path = "../template/assets/img/barang/" . $namaFoto;
        if ($namaFoto) { //cek apakah ada mengisi foto
            if ($tipeFoto == "image/jpeg" || $tipeFoto == "image/png") {
                // cek ukuran fotonya gaboleh lebih dari 10mb
                if ($ukuranFoto <= 1000000) {
                    // cek berhasil apa nggak upload file nya
                    if (move_uploaded_file($foto_tmp, $path)) {
                        mysqli_query($koneksi, "UPDATE `tb_barang` SET
                            id_barang = $id,
                            nama_barang = '$nama_barang',
                            tgl = '$tgl',
                            harga_awal = '$harga_awal',
                            deskripsi_barang = '$deskripsi',
                            foto_barang = '$namaFoto'
                            WHERE id_barang = $id");
                    } else {
                        echo "<script> alert('Maaf, Gambar gagal untuk diupload.'); </script>";
                    }
                } else {
                    echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB'); </script>";
                }
            } else {
                echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.!'); </script>";
            }
        } else {
            mysqli_query($koneksi, "UPDATE `tb_barang` SET 
                id_barang = $id,
                nama_barang = '$nama_barang',
                tgl = '$tgl',
                harga_awal = '$harga_awal',
                deskripsi_barang = '$deskripsi'
                WHERE id_barang = $id");
        }

        header('location:../index?page=barang');
        break;

    case 'hapus':
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM `tb_barang` WHERE id_barang = $id");
        $row = mysqli_fetch_array($query);
        $path = "../template/assets/img/barang/" . $row['foto_barang'];
        unlink($path); //untuk hapus foto
        mysqli_query($koneksi, "DELETE FROM `tb_barang` WHERE id_barang = $id");
        header('location:../index?page=barang');
        break;

    default:
        header('location:../index.php');
        break;
}