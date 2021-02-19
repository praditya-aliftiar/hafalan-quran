<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Selamat datang <?= $user['nama'] ?> di Sistem Informasi Manajemen Hafalan Al-qur'an</p>


    <div class="row">


        <!-- siswa -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-md font-weight-bold text-gray text-uppercase mb-2">Total Hafalan</div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">
                                <?= $siswa ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of siswa -->

        <!-- hafalan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-md font-weight-bold text-gray text-uppercase mb-2">Total Siswa</div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">
                                <?= $hafalan ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-3x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of hafalan -->

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('templates/footer') ?>