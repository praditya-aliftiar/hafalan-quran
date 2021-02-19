<?php $this->view('templates/header') ?>

<?php $this->view('templates/sidebar') ?>

<?php $this->view('templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <!-- jika gagal tambah data karyawan -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <!-- Button trigger modal -->
    <a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#newHafalanModal">+ Add Data</a>

    <!-- table kelas-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
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
                                <td class="text-center"><?= $h->nis ?></td>
                                <td><?= $h->nama ?></td>
                                <td class="text-center"><?= $h->kelas ?></td>
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
                                    <a class="btn btn-warning" href="<?= base_url('guru/update_hafalan/') . $h->id ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger delete-button" href="<?= base_url('guru/delete_hafalan/') . $h->id ?>">
                                        <i class="fa fa-trash"></i>
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



<!-- Modal -->
<div class="modal fade" id="newHafalanModal" tabindex="-1" role="dialog" aria-labelledby="newHafalanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="newHafalanModalLabel">Tambah Hafalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/data_hafalan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nis" placeholder="NIS" name="nis">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" placeholder="Nama Siswa" name="nama">
                    </div>
                    <div class="form-group">
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="" readonly>-- Pilih Kelas --</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="surah" placeholder="Surah" name="surah">
                    </div>
                    <div class="form-group">
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option value="" readonly>-- Pilih keterangan --</option>
                            <option>lancar</option>
                            <option>kurang lancar</option>
                            <option>mengulang</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- end of modal -->

<?php $this->view('templates/footer') ?>

<!-- start sweet alert -->
<script>
    $('.delete-button').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire({
                    title: 'Deleted!',
                    text: "Data berhasil dihapus.",
                    icon: 'success',
                    showConfirmButton: false
                })
            }
        })
    })
</script>