<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- menampilkan message edit profile berhasil -->
    <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px; ">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" class="card-img">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Nama:</td>
                                    <td>&nbsp : <?= $user['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td>&nbsp : <?= $user['username'] ?></td>
                                </tr>
                            </table>

                            <a href="<?= base_url('guru/edit_profile') ?>" class="btn btn-primary btn-sm mt-4">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->view('templates/footer') ?>