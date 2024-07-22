<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>

<?php
var_dump($bayarbyid);
?>


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detil Validasi</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detil Pembayaran</h6>
            </div>
            <div class="card-body">
                <?php
                $hidden = ['id' => $bayarbyid['id']];
                echo form_open('admin/validated', '', $hidden);
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="fullname" value="<?= $personal['fullname']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Bayar</label>
                    <input type="text" class="form-control" id="fullname" value="<?= $bayarbyid['date']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Bayar</label>
                    <input type="text" class="form-control" id="fullname" value="<?= $bayarbyid['jmlh_bayar']; ?>" name="jmlh_bayar">
                </div>

                <button type="submit" class="btn btn-primary">Terima</button>
                <button type="submit" class="btn btn-danger">Tolak</button>
                <a href="<?= base_url('admin/validasi/') ?>" class="btn btn-info">Batal</a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bukti Bayar</h6>
            </div>
            <div class="card-body">
                <picture>
                    <img src="<?= base_url('uploads/') . $bayarbyid['bukti_bayar'] ?>" class="img-fluid" alt="">
                </picture>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>