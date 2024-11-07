<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script>
    let message = <?= json_encode(session()->getFlashdata('message')) ?>;
    let error = <?= json_encode(session()->getFlashdata('error')) ?>;
    let success = <?= json_encode(session()->getFlashdata('success')) ?>;
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>



<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Catatan Bendahara</h1>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
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
    <div class="col-xl-4 col-md-6 mb-4">
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
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
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
        <button class="btn btn-info" data-toggle="modal" data-target="#addPenerimaan">Tambah Pemasukan</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#addPengeluaran">Tambah Pengeluaran</button>

        <button class="btn btn-warning">Cetak Rek. Koran</button>
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
                        <td><?= number_to_currency($kas['debit'], 'IDR', 'id'); ?></td>
                        <td><?= number_to_currency($kas['kredit'], 'IDR', 'id'); ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>



<!-- modal add Penerimaan -->
<div class="modal fade" id="addPenerimaan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="staticBackdropLabel">Tambah Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('admin/adddebit'); ?>

                <div class="form-group row">
                    <label for="tglPemasukan" class="col-sm-4 col-form-label">Tanggal Pemasukan</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" id="tglPemasukan">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jmlhPemasukan" class="col-sm-4 col-form-label">Jumlah Pemasukan</label>
                    <div class="col-sm-8">
                        <input type="number" name="debit" class="form-control" id="jmlhPemasukan">
                        <small class="form-text text-muted">Gunakan tanda titik sebagai pemisah Ribuan</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uraianMasuk" class="col-sm-4 col-form-label">Uraian</label>
                    <div class="col-sm-8">
                        <textarea name="uraian" id="uraianMasuk" class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>


<!-- modall add Pengeluaran -->
<!-- Modal -->
<div class="modal fade" id="addPengeluaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="staticBackdropLabel">TAMBAH PENGELUARAN </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('admin/addkredit'); ?>

                <div class="form-group row">
                    <label for="tglPengeluaran" class="col-sm-4 col-form-label">Tanggal Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" id="tglPengeluaran">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jmlhKredit" class="col-sm-4 col-form-label">Jumlah Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="number" name="kredit" class="form-control" id="jmlhKredit">
                        <small class="form-text text-muted">Gunakan tanda titik sebagai pemisah Ribuan</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uraianKredit" class="col-sm-4 col-form-label">Uraian</label>
                    <div class="col-sm-8">
                        <textarea name="uraian" id="uraianKredit" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Save</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/bendahara.js') ?>"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<?= $this->endSection(); ?>