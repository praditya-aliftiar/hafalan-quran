<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- menampilkan flash data jika berhasil add new karyawan -->
    <?= $this->session->flashdata('message') ?>

    <!-- jika gagal tambah data karyawan -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <!-- table kelas-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $s) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $s->nis ?></td>
                                <td><?= $s->nama ?></td>
                                <td class="text-center"><?= $s->kelas ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('assets/img/profile/') . $s->foto ?>" width="50px" height="50px">
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="<?= base_url('guru/detail_siswa/') . $s->nis ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of table kelas -->

</div>
<!-- end of container fluid -->

</div>
<!-- end of main content -->



<?php $this->view('templates/footer') ?>