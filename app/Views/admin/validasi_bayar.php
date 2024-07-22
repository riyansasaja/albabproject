<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Validasi Pembayaran</h1>

<div class="row">
    <div class="col">
        <table class="table">
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
                <tr>
                    <td>1</td>
                    <td>
                        <a href="">Riyan</a>
                    </td>
                    <td>22/06/2024</td>
                    <td>Rp. 100.000</td>
                    <td>Process</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>