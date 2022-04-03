<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Print Laporan Transaksi Cafe</title>
</head>

<body>
    <table class="table table-border">
        <tr>
            <th>Id Transaksi</th>
            <th>Nama Petugas</th>
            <th>Id Pesanan </th>
            <th>Tanggal Transaksi</th>
            <th>Uang</th>
            <th>Total Bayar</th>
            <th>Kembalian</th>
        </tr>
        <?php
        foreach ($transaksi as $row) {
        ?>

            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['id_pesanan_index2']; ?></td>
                <td><?= $row['tanggal_transaksi']; ?></td>
                <td>Rp <?= number_format($row['uang']) ?></td>
                <td>Rp <?= number_format($row['total_bayar']); ?></td>
                <td>Rp <?= number_format($row['kembalian']); ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
<script>
    window.print();
</script>

</html>