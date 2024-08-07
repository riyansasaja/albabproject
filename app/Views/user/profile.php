<?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
<script>
    let message = <?= json_encode(session()->getFlashdata('message')) ?>;
    let error = <?= json_encode(session()->getFlashdata('error')) ?>;
    let success = <?= json_encode(session()->getFlashdata('success')) ?>
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

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
        <div class="col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detil Peserta</h6>
                    <a href="" class="btn btn-info" id="printpeserta" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-solid fa-user-edit"></i> Edit Data</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col text-center">
                            <div sclass="overflow-hidden bg-primary">
                                <img src="<?= (user()->pict == null) ? base_url('assets/img/undraw_profile.svg') : base_url('profile_pictures/' . user()->pict); ?>" class="rounded-circle shadow-4-strong" alt="" width="200em" height="200em">
                            </div>

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

        <div class="col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detil Peserta</h6>
                    <a href="<?= base_url('editformdata') ?>" class="btn btn-info" id="printpeserta"> <i class="fas fa-solid fa-print"></i> Edit Data</a>
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
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Detil Peserta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="profile/editprofil" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="text" name="id" value="<?= user()->id ?>" hidden>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" value="<?= user()->username ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fullname" value="<?= user()->fullname ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="<?= user()->email ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Foto Profil</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture" accept="image/*">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/profileview.js') ?>"></script>
<?= $this->endSection(); ?>