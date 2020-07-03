<?php
//mengaktifkan session_start
session_start();

//menghapus semus session_start
session_destroy();

//mengalihkan halaman sambil mengirim pesan logout
header("location:../login.php?pesan=logout");