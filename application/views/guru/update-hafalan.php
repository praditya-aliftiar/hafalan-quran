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
                <div class="col-lg-12">
                    <form method="POST" action="<?= base_url('guru/update_hafalan_act') ?>">
                        <?php foreach ($hafalan as $h) : ?>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="hidden" value="<?= $h->id ?>" name="id">
                                <input type="date" name="tanggal" value="<?= $h->tanggal ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">NIS</label>
                                <input type="text" class="form-control" name="nis" value="<?= $h->nis ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $h->nama ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option <?= ($h->kelas == 10 ? 'selected' : '') ?> value="10">10</option>
                                    <option <?= ($h->kelas == 11 ? 'selected' : '') ?> value="11">11</option>
                                    <option <?= ($h->kelas == 12 ? 'selected' : '') ?> value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Surah</label>
                                <input type="text" class="form-control" name="surah" value="<?= $h->surah ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <select name="keterangan" id="keterangan" class="form-control">
                                    <option <?= ($h->keterangan == 'lancar' ? 'selected' : '') ?> value="lancar">lancar</option>
                                    <option <?= ($h->keterangan == 'kurang lancar' ? 'selected' : '') ?> value="kurang lancar">kurang lancar</option>
                                    <option <?= ($h->keterangan == 'mengulang' ? 'selected' : '') ?> value="mengulang">mengulang</option>
                                </select>
                            </div>
                        <?php endforeach; ?>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('guru/data_hafalan') ?>" class="btn btn-outline-danger ml-2">Cancel</a>
                    </form>
                </div>


            </div>

        </div>
    </div>
    <!-- end of table kelas -->

</div>
<!-- end of container fluid -->

</div>
<!-- end of main content -->



<?php $this->view('templates/footer') ?>