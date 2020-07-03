<?php
session_start();
include '../db/config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * FROM `tb_petugas` WHERE `username` = '$username' AND `password` = '$password'");

$fetch = mysqli_fetch_array($data);


if (mysqli_num_rows($data) <= 0) {
    header('location:../login.php?pesan=gagal');
} else {
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $fetch['nama_petugas'];
    $_SESSION['level'] = $fetch['level'];
    header('location:../index');
}