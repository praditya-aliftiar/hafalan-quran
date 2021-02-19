<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-lg-10">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class=" card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <img src="<?= base_url('assets/img/img-login.svg') ?>" class="col-lg-6 d-none d-lg-block ">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5">Login</h1>
                                </div>

                                <!-- menampilkan pesan flash data dari session -->
                                <?= $this->session->flashdata('message') ?>

                                <form class="user" autocomplete="off" method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <div class="row mb-4">
                                            <div class="col-5">
                                                <select name="role" class="form-control">
                                                    <option readonly>Pilih role</option>
                                                    <option>Guru</option>
                                                    <option>Siswa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter username" value="<?= set_value('username') ?>">

                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">

                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">Login</button>
                                </form>

                                <div class="text-center mt-3">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- start sweetalert -->
<?php if ($this->session->flashdata('register-success')) : ?>
    <script>
        swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Registrasi berhasil, silahkan login!",
            showConfirmButton: false,
            timer: 1700
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('login-failed-1')) : ?>
    <script>
        swal.fire({
            icon: "error",
            title: "Gagal!",
            text: "Login gagal, password salah!",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('login-failed-2')) : ?>
    <script>
        swal.fire({
            icon: "error",
            title: "Gagal!",
            text: "Username atau password salah!",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('logout-success')) : ?>
    <script>
        swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Anda berhasil logout!",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>