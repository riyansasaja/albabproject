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
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/usersetting">User Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users Detil</li>
    </ol>
</nav>

<div class="row">
    <div class="col">

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">User Detil</h6>
                <span>Update the personal information of user</span>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <?= form_open('admin/edituser'); ?>
                    <?= form_hidden('id', $user->id); ?>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="username" value="<?= $user->username ?>" name="username">
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label for="userphoto" class="col-sm-3 col-form-label">User Photo</label>
                        <div class="col-sm-8 col-form-label">
                            <img src="<?= base_url('profile_pictures/') . $user->pict ?>" class="img-fluid rounded-circle img-thumbnail" width="100" height="100">
                            <span class="ml-2 badge badge-dark" data-toggle="modal" data-target="#photoupdateModal">Update</span>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="email" value="<?= $user->email ?>" name="email">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="fullname" value="<?= $user->fullname ?>" name="fullname">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-8 col-form-label">
                            <?php foreach ($getRoles as $role): ?>
                                <p> <?= $role['name']; ?> <a href="<?= base_url('admin/delrole/') . $user->id . '/' . $role['group_id'] ?>">
                                        <span class="badge badge-danger badge-pill">-</span>
                                    </a>
                                <?php endforeach; ?>
                        </div>
                    </div>
                    <hr>
                    <button name="update" type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-warning">Reset Password</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#roleModal">Add Role</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="photoupdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/updatepp'); ?>
                <?= form_hidden('id', $user->id); ?>
                <div class="form-group">
                    <label for="profilPicture">Silahkan Pilih Foto</label>
                    <input type="file" class="form-control-file" id="profilPicture" name="picture" accept="image/png, image/gif, image/jpeg">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>


<!-- Modal Add Role -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('admin/addroles'); ?>
                <?= form_hidden('user_id', $user->id); ?>
                <select class="form-control" name="group_id">
                    <option value="" selected>Default select</option>
                    <?php foreach ($allRoles as $key => $r) : ?>
                        <option value="<?= $r->id ?>"><?= $r->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close(); ?>
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