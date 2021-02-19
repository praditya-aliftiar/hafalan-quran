<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <?= form_open_multipart('siswa/edit_profile') ?>
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="nip" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?= $user['nis'] ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">Foto</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <input type="file" class="form-control-file mt-2" id="foto" name="foto">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-end">
        <div class="col-sm-10">
            <button class="btn btn-primary mt-3">Edit</button>
        </div>
    </div>



</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->

<?php $this->view('templates/footer') ?>