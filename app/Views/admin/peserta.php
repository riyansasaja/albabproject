<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Peserta</h1>

<div class="row">
    <div class="col">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Asal Sekolah</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($data_peserta as $peserta) : ?>
                    <tr>
                        <th scope="row"><?= $nomor; ?></th>
                        <td>
                            <a href="<?= base_url('admin/peserta/') . $peserta['user_id'] ?>"><?= $peserta['fullname'];  ?></a>

                        </td>
                        <td><?= $peserta['jenis_kelamin'];  ?></td>
                        <td><?= $peserta['asal_sekolah'];  ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('footer'); ?>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<?= $this->endSection(); ?>