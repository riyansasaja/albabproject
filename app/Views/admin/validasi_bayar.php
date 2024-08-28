<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script>
    let message = <?= json_encode(session()->getFlashdata('message')) ?>;
    let error = <?= json_encode(session()->getFlashdata('error')) ?>;
    let success = <?= json_encode(session()->getFlashdata('success')) ?>
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Validasi Pembayaran</h1>

<div class="row">
    <div class="col">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tgl Transfer</th>
                    <th scope="col">Jmlh Transfer</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- looping array dari controller -->
                <?php $nomor = 1; ?>
                <?php foreach ($databayar as $data) : ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td>
                            <a href="<?= base_url('admin/validasi/') . $data['id'] ?>"><?= $data['fullname']; ?></a>
                        </td>
                        <td><?= $data['date']; ?></td>
                        <td><?= number_to_currency($data['jmlh_bayar'], 'IDR', 'ID', 2);  ?></td>
                        <td>
                            <?php
                            if ($data['status'] == 1) {
                                echo "Process";
                            }
                            if ($data['status'] == 2) {
                                echo "Approved";
                            }
                            if ($data['status'] == 3) {
                                echo "Rejected";
                            }
                            if ($data['status'] == 4) {
                                echo "Discount";
                            }


                            ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/validasi_bayar.js') ?>"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<?= $this->endSection(); ?>