<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row mb-4">

    <!-- rekap peserta by jk -->
    <div class="col-md-4">
        <div class="card border-left-info shadow py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 my-auto"> <img src="<?= base_url('assets/img/girl-a.png') ?>" class="img-fluid"></div>
                    <div class="col-8 my-auto">
                        <h4> Rekapan Pendaftar By. Jenis Kelamin</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ikhwan</th>
                                    <th>Akhwat</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $countjk[0]['males'] ?></td>
                                    <td><?= $countjk[0]['females'] ?></td>
                                    <td><?= $countjk[0]['total'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- rekapan ukuran kaos ikhwan -->
    <div class="col-md-4">
        <div class="card border-left-primary shadow py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 my-auto"> <img src="<?= base_url('assets/img/boy.png') ?>" class="img-fluid"></div>
                    <div class="col-8 my-auto">
                        <h4> Rekapan Uk. Kaos Ikhwan</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>S</th>
                                    <td><?= $shirtmales[0]['S']; ?></td>
                                </tr>
                                <tr>
                                    <th>M</th>
                                    <td><?= $shirtmales[0]['M']; ?></td>
                                </tr>
                                <tr>
                                    <th>L</th>
                                    <td><?= $shirtmales[0]['L']; ?></td>
                                </tr>
                                <tr>
                                    <th>XL</th>
                                    <td><?= $shirtmales[0]['XL']; ?></td>

                                </tr>
                                <tr>
                                    <th>2XL</th>
                                    <td><?= $shirtmales[0]['XXL']; ?></td>
                                </tr>
                                <tr>
                                    <th>3XL</th>
                                    <td><?= $shirtmales[0]['XXXL']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?= $shirtmales[0]['total']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- rekapan ukuran kaos akhwat -->
    <div class="col-md-4">
        <div class="card border-left-warning shadow py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 my-auto"> <img src="<?= base_url('assets/img/girl.png') ?>" class="img-fluid"></div>
                    <div class="col-8 my-auto">
                        <h4> Rekapan Uk. Kaos Akhwat</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>S</th>
                                    <td><?= $shirtfemales[0]['S']; ?></td>
                                </tr>
                                <tr>
                                    <th>M</th>
                                    <td><?= $shirtfemales[0]['M']; ?></td>
                                </tr>
                                <tr>
                                    <th>L</th>
                                    <td><?= $shirtfemales[0]['L']; ?></td>
                                </tr>
                                <tr>
                                    <th>XL</th>
                                    <td><?= $shirtfemales[0]['XL']; ?></td>

                                </tr>
                                <tr>
                                    <th>2XL</th>
                                    <td><?= $shirtfemales[0]['XXL']; ?></td>
                                </tr>
                                <tr>
                                    <th>3XL</th>
                                    <td><?= $shirtfemales[0]['XXXL']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?= $shirtfemales[0]['total']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>