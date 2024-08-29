<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Catan Bendahara</h1>

<div class="row">
    <div class="col">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">tgl</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Kredit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th colspan="2">Total</th>
                    <th scope="col">Rp. 200.000,-</th>
                    <th scope="col">Rp. 100.000-,-</th>
                </tr>
            </tfoot>
            <tbody>

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