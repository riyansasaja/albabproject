<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php
// dd($users); 
?>



<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users Management</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users Meneg</li>
    </ol>
</nav>
<div class="row mb-2">
    <div class="col-md-4 col-sm-6">
        <div class="card border-left-success">
            <div class="card-body">
                <b>Total Users</b> <br> <?= count($users); ?>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="card border-left-warning">
            <div class="card-body">
                <b>Active Users </b><br> <?= number_format(($usersactive / count($users)) * 100, 2, ',', '') ?> %
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <a href="">
                                            <?= $user->fullname; ?>
                                        </a>
                                    </td>
                                    <td><?= $user->email; ?></td>
                                    <td><?= $user->active == 1 ? 'Active' : 'Pasiv'; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>

<?= $this->section('footer'); ?>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/swal.js"></script>
<?= $this->endSection(); ?>