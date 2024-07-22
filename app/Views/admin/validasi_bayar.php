<?= $this->extend('admin/layoutAdmin'); ?>

<?= $this->section('header'); ?>
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
                <!-- looping array dari controller -->
                <?php $nomor = 1; ?>
                <?php foreach ($databayar as $data) : ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td>
                            <a href="<?= base_url('admin/validasi/') . $data['user_id'] ?>"><?= $data['fullname']; ?></a>
                        </td>
                        <td><?= $data['date']; ?></td>
                        <td><?= number_to_currency($data['jmlh_bayar'], 'IDR', 'ID', 2);  ?></td>
                        <td>
                            <?php
                            if ($data['status'] == 1) {
                                echo "Process";
                            }
                            if ($data['status'] == 2) {
                                echo "Validated";
                            }
                            if ($data['status'] == 3) {
                                echo "Dicount";
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