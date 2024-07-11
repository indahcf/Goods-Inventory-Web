<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
        <div class="sidebar-brand-icon mr-2">
            <i class="fas fa-boxes"></i>
        </div>
        <div class="sidebar-brand-text">Inventory App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'incoming') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('incoming') ?>">
            <i class="fas fa-download"></i>
            <span>Barang Masuk</span></a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'outcoming') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('outcoming') ?>">
            <i class="fas fa-upload"></i>
            <span>Barang Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= in_array($this->uri->segment(1), array('item', 'category', 'unit')) ? 'active' : '' ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseItems" aria-expanded="true" aria-controls="collapseItems">
            <i class="fas fa-fw fa-box"></i>
            <span>Barang</span>
        </a>
        <div id="collapseItems" class="collapse <?= in_array($this->uri->segment(1), array('item', 'category', 'unit')) ? 'show' : '' ?>" aria-labelledby="headingItems" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($this->uri->segment(1) == 'item') ? 'active' : '' ?>" href="<?= base_url('item') ?>">Barang</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>" href="<?= base_url('category') ?>">Kategori</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'unit') ? 'active' : '' ?>" href="<?= base_url('unit') ?>">Satuan</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'supplier') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('supplier') ?>">
            <i class="fas fa-fw fa-store"></i>
            <span>Supplier</span></a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'customer') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('customer') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span></a>
    </li>


    <?php if ($this->session->auth->role == 'admin') : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Laporan
        </div>

        <li class="nav-item <?= ($this->uri->segment(1) == 'report') && ($this->uri->segment(2) == 'incoming') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('report/incoming') ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan Barang Masuk</span></a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == 'report') && ($this->uri->segment(2) == 'outcoming') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('report/outcoming') ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan Barang Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pengaturan
        </div>
        <li class="nav-item <?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('user') ?>">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Akun Pengguna</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif; ?>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>