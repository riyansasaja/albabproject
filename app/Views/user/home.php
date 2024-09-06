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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800 mx-auto">FORMULIR PENDAFTARAN PESERTA ALBAB 1 BATCH XIV-2024 </h1>
    </div>

    <!-- content Row -->
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <div class="row">
                <!-- content start -->

                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col text-center">
                                    <p>Assalamu'alaikum <b class="text-uppercase"><?= user()->fullname ?></b></p>

                                    <p>Silahkan <b>Lengkapi Data</b> dan <b>Lakukan Pembayaran</b> untuk mengikuti Kegiatan Kedepan</p>
                                    <p>Untuk Informasi Lebih lanjut Silahkan Gabung di Group Whatsapp dengan menekan tombol di bawah ini</p>
                                    <a target="_blank" href="https://chat.whatsapp.com/LxIJKdeT6ZFKgioSLBXB6J" class="btn btn-primary">Join WA Group</a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?= $this->renderSection('nextcard'); ?>


        </div>
    </div>



</div>


<!-- modaltambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/uploadcicil') ?>" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="jumlah">Jumlah Pembayaran</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="number" class="form-control" aria-describedby="basic-addon1" name="jmlh_bayar" id="jumlah">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="uploadStruk">Upload Bukti Pembayaran</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadStruk" aria-describedby="inputGroupFileAddon01" name="userfile" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- modal detail bayar -->
<div class="modal fade" id="modalBayar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodydata">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>Process Validasi</td>
                        </tr>
                        <tr>
                            <th>Tgl Upload</th>
                            <td>08/08/2024</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayar</th>
                            <td>Rp. 100.000,-</td>
                        </tr>
                        <tr>
                            <th>Bukti Bayar</th>
                        </tr>
                    </tbody>
                </table>
                <img class="img-fluid" src="<?= base_url('uploads/bukti_1720680745.png') ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/homeview.js') ?>"></script>
<?= $this->endSection(); ?>