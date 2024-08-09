<?= $this->extend('user/home'); ?>
<?= $this->section('nextcard'); ?>
<?php


if ($bayars) {
    # code...
    $telahBayar = $totalbayar[0]['jmlh_bayar'];
    if ($telahBayar == null) {
        # code...
        $telahBayar = 0;
    }
} else {
    # code...
    $telahBayar = 0;
}
$hargaTiket = 500000;
$diskon = 0;

$sisaBayar = $hargaTiket - $telahBayar;


?>

<div class="row">
    <!-- content start -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="row no-gutter">
                <div class="col-4 py-3">
                    <img class="img-fluid" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" alt="...">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        Telah Bayar <br>
                        <h3 class="text-primary my-2"><?= number_to_currency($telahBayar, 'IDR', 'ID', 2); ?></h3>
                        Sisa Pelunasan <br>
                        <span class="text-info"><?= number_to_currency($sisaBayar, 'IDR', 'ID', 2);  ?></span>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <!-- content start -->
    <div class="col-lg-12">
        <div class="card shadow mb-4 px-2">
            <div class="row no-gutter">
                <div class="col">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Riwayat Pembayaran</th>
                                    <th>
                                        <?php if ($sisaBayar != 0) : ?>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal" id="tambah">Tambah</button>
                                        <?php else : ?>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal" id="tambah" disabled>Tambah</button>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                            </thead>

                        </table>

                        <table class="table">

                            <tbody>
                                <?php foreach ($bayars as $bayar) : ?>
                                    <tr>
                                        <th><?= $bayar['date']; ?></th>
                                        <td class="text-right"><?= number_to_currency($bayar['jmlh_bayar'], 'IDR', 'ID', 2);  ?></td>
                                        <td>
                                            <?php
                                            if ($bayar['status'] == 1) {
                                                # code...
                                                echo '<span class="pill badge badge-pill badge-warning" data-id =' . $bayar['id'] . '>Process</span>';
                                            }
                                            if ($bayar['status'] == 2) {
                                                # code...
                                                echo '<span class="pill badge badge-pill badge-success" data-id =' . $bayar['id'] . '>Approved</span>';
                                            }
                                            if ($bayar['status'] == 3) {
                                                # code...
                                                echo '<span class="pill badge badge-pill badge-danger" data-id =' . $bayar['id'] . '>Rejected</span>';
                                            }
                                            if ($bayar['status'] == 4) {
                                                # code...
                                                echo '<span class="pill badge badge-pill badge-info" data-id =' . $bayar['id'] . '>Dicount</span>';
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php if ($sisaBayar == 0) : ?>
            <p class="text-center mx-3">Selamat Pembayaran Sudah Lunas, silahkan Download Tiket dengan mengklik Tombol di bawah ini.</p>
            <a href="<?= base_url('tiket/') ?>" class="btn btn-primary btn-block">Download Tiket</a>
        <?php else : ?>
            <p class="text-center mx-3">Setelah pembayaran Lunas, tombol tiket akan muncul di bawah ini.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>