<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="<?= $_GET['page'] == '' ? 'active' : '' ?>">
            <a href="./" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Barang</li>
        <li class="<?= $_GET['page'] == 'barang' ? 'active' : '' ?>">
            <a class="nav-link" href="./index?page=barang"><i class="fas fa-list"></i> <span>Barang
                    Lelang</span></a>
        </li>
        <!-- Menu admin -->
        <?php if ($_SESSION['level'] == 'admin') { ?>
        <li class="menu-header">Registrasi</li>
        <li class="<?= $_GET['page'] == 'regis_petugas' ? 'active' : '' ?>">
            <a class="nav-link" href="./index?page=regis_petugas">
                <i class="fas fa-users"></i>
                <span>Regis Petugas</span></a>
        </li>

        <!-- Menu Petugas -->
        <?php } else { ?>
        <li class="menu-header">Lelang</li>
        <li class="<?= $_GET['page'] == 'lelang' ? 'active' : '' ?>">
            <a class="nav-link" href="./index?page=lelang">
                <i class="fas fa-users"></i>
                <span>List Lelang</span></a>
        </li>

        <?php } ?>

        <li class="menu-header">Laporan</li>
        <li class="<?= $_GET['page'] == 'laporan' ? 'active' : '' ?>">
            <a class="nav-link" href="./index?page=laporan">
                <i class="fas fa-info"></i>
                <span>Laporan</span></a>
        </li>
    </ul>
</aside>