<?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
<script>
    let message = <?= json_encode(session()->getFlashdata('message')) ?>;
    let error = <?= json_encode(session()->getFlashdata('error')) ?>;
    let success = <?= json_encode(session()->getFlashdata('success')) ?>
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detil Peserta</h6>
                <a href="" class="btn btn-info" id="printpeserta"> <i class="fas fa-solid fa-print"></i> Edit Data</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <picture>
                            <img src="<?= base_url('assets/img/undraw_profile.svg') ?>" class="img-fluid rounded mb-2" alt="" width="30%">
                        </picture>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?= user()->username ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jelas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?= user()->fullname ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" value="<?= user()->email ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row mb-3">

    <div class="col">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detil Peserta</h6>
                <a href="" class="btn btn-info" id="printpeserta"> <i class="fas fa-solid fa-print"></i> Edit Data</a>
            </div>
            <div class="card-body">

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
</div>






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/homeview.js') ?>"></script>
<?= $this->endSection(); ?>