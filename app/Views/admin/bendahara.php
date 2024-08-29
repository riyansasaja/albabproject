<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>



<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Catatan Bendahara</h1>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pemasukan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_to_currency($totaldebit[0]['debit'], 'IDR', 'id') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pengeluaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_to_currency($totalkredit[0]['kredit'], 'IDR', 'id')  ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Saldo</div>
                        <?php $saldo = $totaldebit[0]['debit'] - $totalkredit[0]['kredit']; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_to_currency($saldo, 'IDR', 'id')  ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col mb-2">
        <button class="btn btn-warning">Tambah Pemasukan</button>
        <button class="btn btn-danger">Tambah Pengeluaran</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">tgl</th>
                    <th scope="col">Uraian</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Kredit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th colspan="2">Total</th>
                    <th scope="col"><?= number_to_currency($totaldebit[0]['debit'], 'IDR', 'id') ?></th>
                    <th scope="col"> <?= number_to_currency($totalkredit[0]['kredit'], 'IDR', 'id')  ?></th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($aruskas as $kas) : ?>
                    <tr>
                        <td scope="row"><?= $i ?></td>
                        <td><?= $kas['tgl'] ?></td>
                        <td><?= $kas['uraian'] ?></td>
                        <td><?= $kas['debit'] ?></td>
                        <td><?= $kas['kredit'] ?></td>
                    </tr>
                    <?php $i++; ?>
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