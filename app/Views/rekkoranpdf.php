<?php
$debit = [];
$kredit = [];
foreach ($aruskas as $arus) {
    $debit[] = $arus['debit'];
    $kredit[] = $arus['kredit'];
}
$totaldebit = array_sum($debit);
$totalkredit = array_sum($kredit);

// d($totaldebit);
// dd($totalkredit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ini Title</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
        }

        #table {
            font-family: 'Courier New', Courier, monospace;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #b3b9c4;
            color: black;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Rekening Koran</h3>
        <h3>Tanggal <?= date('d-m-y', strtotime($dateStart)); ?> sampai <?= date('d-m-y', strtotime($dateEnd)); ?></h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tgl</th>
                <th>Uraian</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>

        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($aruskas as $kas) : ?>
                <tr>
                    <td scope="row"><?= $nomor++; ?></td>
                    <td><?= date('d-m-Y', strtotime($kas['tgl'])); ?></td>
                    <td><?= $kas['uraian']; ?></td>
                    <td><?= number_to_currency($kas['debit'], 'IDR', 'id'); ?></td>
                    <td><?= number_to_currency($kas['kredit'], 'IDR', 'id'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th colspan="2">Total</th>
                <th scope="col"><?= number_to_currency($totaldebit, 'IDR', 'id') ?></th>
                <th scope="col"> <?= number_to_currency($totalkredit, 'IDR', 'id')  ?></th>
            </tr>
        </tfoot>
    </table>
    <p>============================ End Page</p>
    <p>Tanggal Cetak <?= date('d-m-y'); ?></p>

</body>

</html>