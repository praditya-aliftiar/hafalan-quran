<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-3">

        <div class="col-lg-10">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class=" card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <img src="<?= base_url('assets/img/img-registration.svg') ?>" class="col-lg-6 d-none d-lg-block ">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5">Registration</h1>
                                </div>

                                <form class="user" autocomplete="off" method="post" action="<?= base_url('auth/registration') ?>">
                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <div class="col-6 small">
                                                <select class="form-control" name="kelas" value="<?= set_value('kelas') ?>">
                                                    <option readonly>Pilih Kelas</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">

                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="NIS" value="<?= set_value('nis') ?>">

                                        <?= form_error('nis', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">

                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">

                                            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder=" Repeat Password" value="<?= set_value('password2') ?>">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">Register</button>
                                </form>
                                <div class="text-center mt-3">
                                    <a class="small" href="<?= base_url('auth') ?>">Back to login</a> <br>
                                    <a class="small" href="<?= base_url('guru/registration') ?>">Daftar sebagai Guru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>