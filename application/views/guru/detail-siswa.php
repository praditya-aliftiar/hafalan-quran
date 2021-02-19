<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- menampilkan flash data jika berhasil add new karyawan -->
    <?= $this->session->flashdata('message') ?>


    <!-- table kelas-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-4">
                    <?php foreach ($siswa as $s) : ?>
                        <img src="<?= base_url('assets/img/profile/') . $s->foto ?>" width="300px" height="300px" class="mb-4">
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6 mt-4">
                    <?php foreach ($siswa as $s) : ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>NIS</td>
                                <td><?= $s->nis ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?= $s->nama ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td><?= $s->kelas ?></td>
                            </tr>
                        </table>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-12">
                <h3 class="mt-4">History Hafalan</h3>
                <table class="table table-bordered table-striped">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Surah</th>
                                <th class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hafalan as $h) : ?>
                                <tr>
                                    <td class="text-center">
                                        <?= date('m-d-Y', strtotime($h->tanggal)) ?>
                                    </td>
                                    <td><?= $h->surah ?></td>
                                    <td class="text-center">
                                        <?php if ($h->keterangan == 'lancar') : ?>
                                            <h5><span class="badge badge-success">Lancar</span></h5>
                                        <?php endif; ?>
                                        <?php if ($h->keterangan == 'kurang lancar') : ?>
                                            <h5><span class="badge badge-warning">Kurang Lancar</span></h5>
                                        <?php endif; ?>
                                        <?php if ($h->keterangan == 'mengulang') : ?>
                                            <h5><span class="badge badge-danger">Mengulang</span></h5>
                                        <?php endif; ?>
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