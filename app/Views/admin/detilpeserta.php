<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>

<?php
// var_dump($data_peserta);
?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Detil Peserta</h1>
<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detil Peserta</h6>
                <a href="" class="btn btn-info" id="printpeserta"> <i class="fas fa-solid fa-print"></i> Print Info Peserta</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <picture>
                            <img src="<?= ($data_peserta['pict'] == null) ? base_url('assets/img/undraw_profile.svg') : base_url('profile_pictures/' . $data_peserta['pict']) ?>" class="img-fluid rounded-circle mb-2" alt="" width="40%">
                        </picture>
                    </div>
                </div>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Jelas</th>
                            <td><?= $data_peserta['fullname'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis kelamin</th>
                            <td><?= $data_peserta['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <th>Asal Sekolah</th>
                            <td><?= $data_peserta['asal_sekolah'] ?></td>
                        </tr>
                        <tr>
                            <th>Cita Cita</th>
                            <td><?= $data_peserta['cita_cita'] ?></td>
                        </tr>
                        <tr>
                            <th>Motivasi Mengikuti Kegiatan</th>
                            <td><?= $data_peserta['motivasi'] ?></td>
                        </tr>
                        <tr>
                            <th>Ukuran Baju</th>
                            <td><?= $data_peserta['ukuran_baju'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td><?= $data_peserta['nomor_telpon'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Telpon Ortu</th>
                            <td><?= $data_peserta['nomor_telpon_ortu'] ?></td>
                        </tr>
                        <tr>
                            <th>Pengalaman Organisasi</th>
                            <td><?= $data_peserta['pengalaman'] ?></td>
                        </tr>
                        <tr>
                            <th>Aktivitas</th>
                            <td><?= $data_peserta['aktivitas'] ?></td>
                        </tr>
                        <tr>
                            <th>Orang Yang Paling Berpengaruh Dalam Hidup Anda</th>
                            <td><?= $data_peserta['opbdh'] ?></td>
                        </tr>
                        <tr>
                            <th>Apa Nilai Moral/ Akhlak Yang Orang Tua Ajarkan Sejak Kecil
                            </th>
                            <td><?= $data_peserta['nm'] ?></td>
                        </tr>
                        <tr>
                            <th>Bidang Keilmuan Yang Anda Sukai</th>
                            <td><?= $data_peserta['bi'] ?></td>
                        </tr>
                        <tr>
                            <th>Saya Mendapat Pengetahuan Agama Dari</th>
                            <td><?= $data_peserta['smpad'] ?></td>
                        </tr>
                        <tr>
                            <th>Siapa Tokoh Yang Menginspirasi Dalam Kehidupan Anda</th>
                            <td><?= $data_peserta['stmdka'] ?></td>
                        </tr>
                        <tr>
                            <th>Apa Pengalaman Yang Paling Berkesan Dalam Hidup Anda</th>
                            <td><?= $data_peserta['apypbdha'] ?></td>
                        </tr>
                        <tr>
                            <th>Kegagalan Yang Tak Terlupakan</th>
                            <td><?= $data_peserta['kytt'] ?></td>
                        </tr>
                        <tr>
                            <th>Anda Mengetahui Informasi Training Albab Dari</th>
                            <td><?= $data_peserta['amtad'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#diskonModal" id="diskon">Add Diskon</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <?php foreach ($bayarbyid as $bayar) : ?>
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




<!-- modalDiskon -->
<div class="modal fade" id="diskonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $hidden = [
                    'user_id' => $data_peserta['user_id'],
                    'fullname' => $data_peserta['fullname']
                ];
                echo form_open('admin/addDiscount', '', $hidden);
                ?>
                <div class="form-group">
                    <label for="jumlah">Jumlah Diskon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input type="number" class="form-control" aria-describedby="basic-addon1" name="jmlh_bayar" id="jumlah">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/detilpeserta.js') ?>"></script>
<?= $this->endSection(); ?>