<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message') ?>

    <form action="<?= base_url('guru/laporan_hafalan') ?>" method="get">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="tgl_awal">Tanggal Awal</label>
                <input class="form-control tgl_awal" type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="tgl_akhir">Tanggal Akhir</label>
                <input class="form-control tgl_akhir" type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm mr-3 mb-3" name="filter" value="true">Tampilkan</button>

        <?php
        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
            echo '<a href="' . base_url('guru/laporan_hafalan') . '" class="btn btn-danger btn-sm mb-3">Kembali</a>';
        ?>
    </form>



    <!-- table lap.kunjungan-->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <a class="btn btn-info btn-sm mt-2" href="<?= $url_cetak ?>">Cetak Pdf</a>
                <h4 class="text-center mb-4"><?= $label ?></h4>
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Surah</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hafalan as $h) : ?>
                            <tr>
                                <td class="text-center"><?= date('d-M-Y', strtotime($h->tanggal)) ?></td>
                                <td class="text-center"><?= $h->nis ?></td>
                                <td><?= $h->nama ?></td>
                                <td><?= $h->kelas ?></td>
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
    <!-- end of table lap.kunjungan -->


</div>
<!-- end of container fluid -->

</div>
<!-- end of main content -->

<?php $this->view('templates/footer') ?>