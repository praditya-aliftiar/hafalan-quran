<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white mb-2">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Al-layyinah</div>
    </a>



    <!-- tampilan sidebar jika login sebagai guru -->
    <?php if ($this->session->userdata('role') == 1) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($this->uri->segment(2) == "") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url('guru') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(2) == "profile") {
                                echo "active";
                            } ?>
                            <?php if ($this->uri->segment(2) == "edit_profile") {
                                echo "active";
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('guru/profile') ?>">My Profile</a>
                    <a class="collapse-item" href="<?= base_url('guru/edit_profile') ?>">Edit Profile</a>
                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item <?php if ($this->uri->segment(2) == "data_siswa") {
                                echo "active";
                            } ?>
                            <?php if ($this->uri->segment(2) == "detail_siswa") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url('guru/data_siswa') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Siswa</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(2) == "data_hafalan") {
                                echo "active";
                            } ?>
                            <?php if ($this->uri->segment(2) == "update_hafalan") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url('guru/data_hafalan') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Hafalan Siswa</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(2) == "laporan_hafalan") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url('guru/laporan_hafalan') ?>">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Laporan Hafalan</span></a>
        </li>
    <?php endif; ?>
    <!-- akhir tampilan guru -->


    <!-- tampilan jika login sebagai siswa -->
    <?php if ($this->session->userdata('role') == 2) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= activate_menu('siswa') ?>">
            <a class="nav-link" href="<?= base_url('siswa') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider my-0">


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= activate_menu('user') ?>">
            <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('siswa/profile') ?>">My Profile</a>
                    <a class="collapse-item" href="<?= base_url('siswa/edit_profile') ?>">Edit Profile</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item <?= activate_menu('hafalan') ?>">
            <a class="nav-link" href="<?= base_url('siswa/data_hafalan') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Hafalan Saya</span></a>
        </li>


    <?php endif; ?>
    <!-- akhir tampilan siswa -->




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mb-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->