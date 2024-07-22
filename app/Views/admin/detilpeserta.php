<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Detil Peserta</h1>
<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                Card Detil Peserta.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                <a href="" class="btn btn-primary btn-sm">Add Diskon</a>
            </div>
            <div class="card-body">
                Card Status Pembayaran
            </div>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>