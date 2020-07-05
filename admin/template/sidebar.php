<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-gavel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi lelang</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $_GET['page'] == '' ? 'active' : '' ?>">
        <a class="nav-link" href="./">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $_GET['page'] == 'data_barang' ? 'active' : '' ?>">
        <a class="nav-link" href="?page=data_barang">
            <i class="fas fa-fw fa-braille"></i>
            <span>Data Barang</span></a>
    </li>

    <?php if($_SESSION['level'] == 'petugas') { ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $_GET['page'] == 'lelang' || 'penawara_lelang' ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-gavel"></i>
            <span>Lelang</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=lelang">Data Lelang</a>
                <a class="collapse-item" href="?page=penawar_lelang">Penawar</a>
            </div>
        </div>
    </li>
    <?php } else { ?>
    <li class="nav-item <?= $_GET['page'] == 'petugas' ? 'active' : '' ?>">
        <a class="nav-link" href="?page=petugas">
            <i class="fas fa-fw fa-users"></i>
            <span>Petugas</span></a>
    </li>
    <? } ?>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= $_GET['page'] == 'laporan' ? 'active' : '' ?>">
        <a class="nav-link" href="?page=laporan">
            <i class="fas fa-fw fa-history"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>