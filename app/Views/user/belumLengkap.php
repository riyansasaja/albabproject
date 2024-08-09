<?= $this->extend('user/home'); ?>

<?= $this->section('nextcard'); ?>

<div class="row">
    <!-- content start -->
    <div class="col-lg-12">
        <div class="card shadow mb-4 py-5">
            <div class="card-body text-center">
                <p>Mohon Maaf</p>
                <h4 class="text-danger"><b>Anda Belum Melengkapi Data !!</b></h4>

                <p>Silahkan <b>Lengkapi Data</b> dengan mengklik tombol di bawah ini </p>
                <a href="<?= base_url('formdata') ?>" class="btn btn-primary">Lengkap Data Pribadi</a>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>