<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i
                        class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Email</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dosen as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['mata_kuliah'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td class="text-center d-flex">
                                <button class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                    data-target="#edit-data<?= $value['id_dosen'] ?>"><i
                                        class="fas fa-pencil-alt"></i>Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapus-data<?= $value['id_dosen'] ?>"><i
                                        class="fas fa-trash"></i>Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subtitle ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/dosen/insertData" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama dosen</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan dosen" required>
                    </div>
                    <div class="form-group">
                        <label for="mata_kuliah">Mata Kuliah</label>
                        <select name="mata_kuliah" class="form-control" id="mata_kuliah">
                                <option>Pilih</option>
                                <option value="Pemrograman">Pemrograman</option>
                                <option value="MPSI">MPSI</option>
                                <option value="Kalkulus">Kalkulus</option>
                                <option value="Basis Data"> Basis Data</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email"
                            required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($dosen as $key => $value) { ?>
<!-- Modal Tambah Data -->
<div class="modal fade" id="edit-data<?= $value['id_dosen'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subtitle ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/dosen/updateData/<?= $value['id_dosen'] ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Dosen</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan dosen" value="<?= $value['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mata_kuliah">Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" id="mata_kuliah" class="form-control" placeholder="Masukkan Mata Kuliah " value="<?= $value['mata_kuliah'] ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email" value="<?= $value['email'] ?>"
                            required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<!-- Modal Hapus Data -->
<?php foreach ($dosen as $key => $value) { ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="hapus-data<?= $value['id_dosen'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subtitle ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <?= $subtitle ?> <b><?= $value['nama'] ?></b>..?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('dosen/deleteData/'.$value['id_dosen']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<?= $this->endSection() ?>