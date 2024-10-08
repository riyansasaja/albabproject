<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detil Validasi</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/validasi">Validasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detil Validasi</li>
    </ol>
</nav>
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
                    <input type="text" class="form-control" id="fullname" value="<?= $bayarbyid['fullname']; ?>" name="nama" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Bayar</label>
                    <input type="text" class="form-control" id="tgl_bayar" value="<?= $bayarbyid['date']; ?>" name="tgl_bayar" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Bayar</label>
                    <input type="text" class="form-control" id="fullname" value="<?= $bayarbyid['jmlh_bayar']; ?>" name="jmlh_bayar" <?= $bayarbyid['status'] == 2 ? 'readonly' : '' ?>>
                </div>
                <?php if ($bayarbyid['status'] != 1) : ?>
                    <button type="submit" class="btn btn-secondary btn-block mb-3" disabled>Has Validated</button>
                    <button type="submit" name="submitform" value="cancel" class="btn btn-danger">Cancel Validation</button>
                <?php else : ?>
                    <button type="submit" name="submitform" value="terima" class="btn btn-primary">Terima</button>
                    <button type="submit" name="submitform" value="tolak" class="btn btn-danger">Tolak</button>
                <?php endif; ?>
                <a href="<?= base_url('admin/validasi') ?>" class="btn btn-info">Kembali</a>
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