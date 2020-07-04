<?php
include '../db/config.php';

include './template/header.php';

session_start();

if (empty($_SESSION))  header('location:login.php');
?>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Navbar -->
            <?php include './template/navbar.php' ?>
            <!-- End Navbar -->

            <!-- Sidebar -->
            <div class="main-sidebar">
                <?php include './template/sidebar.php' ?>
            </div>
            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="main-content">
                <?php
                if (!empty($_GET['page'])) {
                    include './pages/' . $_GET["page"] . '.php';
                } else {
                    include './pages/dashboard.php'
                ?>
            </div>
            <?php } ?>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include './template/footer.php' ?>
            <!-- End Footer -->
</body>

</html>