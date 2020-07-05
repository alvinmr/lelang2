<?php
include '../db/config.php';

include './template/header.php';

session_start();

if (empty($_SESSION['level'])) header('location:login.php');
?>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("./template/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("./template/topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php if(!empty($_GET['page'])){
                    include("./pages/". $_GET['page'] .".php");
                } else{
                    include("./pages/dashboard.php");
                } ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include("./template/footer.php") ?>