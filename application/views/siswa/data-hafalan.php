<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- table kelas-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Surah</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hafalan as $h) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= date('m-d-Y', strtotime($h->tanggal)) ?></td>
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
                                <td class="text-center">
                                    <a class="btn btn-info" href="<?= base_url('siswa/detail_hafalan/') . $h->id ?>">
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