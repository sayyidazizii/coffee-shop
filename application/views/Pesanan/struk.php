<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Invoice Pesanan</title>
</head>

<body>
    <center>
    <table class="table table-border">
        <tr>
            <th hidden>id Detail</th>
            <th>Id pesanan</th>
            <th hidden>Id Menu</th>
            <th>Nama Menu</th>
            <th>jumlah</th>
            <th>jumlah Harga</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $jumlah = 0;
        $indexpesanan = 0;
        foreach ($transaksi as $row) {
            $jumlah += $row->jumlah_harga;
            $indexpesanan = $row->id_pesanan_index;
        ?>
            <tr>
                <td hidden><?= $row->id_pesan ?></td>
                <td><?= $row->id_pesanan_index ?></td>
                <td hidden><?= $row->id_masakan ?></td>
                <td><?= $row->nama_masakan ?></td>
                <td><?= $row->jumlah_pesanan ?></td>
                <td><?php echo $row->jumlah_harga ?></td>
                <td><?= $row->keterangan ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>Bayar</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?php echo $jumlah ?></strong></td>
            <td></td>
        </tr>
    </table>
    </center>

</body>
<script>
    window.print();
</script>

</html>