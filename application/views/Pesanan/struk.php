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

    <div class="card mt-5 border-dark" style="position:relative;width:50%;margin-left:25%;">
        <table class="table table-borderless">
            <p class="fw-bold text-center">Terimakasih Telah Mampir Di Cafe Kami</p>
            <tr>
                <th>Customer</th>
                <td><?php echo $pesanan->customer ?></td>
            </tr>
            <tr>
                <th>Petugas</th>
                <td><?php echo $pesanan->nama_user ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $pesanan->tanggal ?></td>
            </tr>

            <tr>
                <th>Nama Menu</th>
                <th>jumlah</th>
                <th>jumlah Harga</th>
            </tr>
            <?php
            $jumlah = 0;
            $indexpesanan = 0;
            foreach ($struk as $row) {
                $jumlah += $row->jumlah_harga;
                $indexpesanan = $row->id_pesanan_index;
            ?>
                <tr>
                    <td><?= $row->nama_masakan ?></td>
                    <td class=" text-center"><?= $row->jumlah_pesanan ?></td>
                    <td><?php echo $row->jumlah_harga ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td><strong>Total Bayar</strong></td>
                <td class=" text-center"><strong> : </strong></td>
                <td><strong><?php echo $jumlah ?></strong></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Uang</strong></td>
                <td class=" text-center"><strong> : </strong></td>
                <td><strong><?php echo $transaksi->uang ?></strong></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Kembalian</strong></td>
                <td class=" text-center"><strong> : </strong></td>
                <td><strong><?php echo $transaksi->kembalian  ?></strong></td>
                <td></td>
            </tr>
        </table>
    </div>

</body>
<script>
    window.print();
</script>

</html>