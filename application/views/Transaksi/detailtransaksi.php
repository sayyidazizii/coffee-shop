<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- sidebar -->
        <?php $this->load->view('layout/sidebar') ?>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->

            <!-- navbar -->
            <?php $this->load->view('layout/navbar') ?>

            <!-- Page content-->
            <div class="container-fluid">
            <h1 class="mt-4">Detail Transaksi </h1>
            <a href="<?php echo base_url('Transaksi') ?>" class="btn btn-primary">Kembali</a>
                <div class="card shadow mt-3">
                    <div class="card-header">
                        Detail Transaksi
                    </div>
                    <div class="container mt-3" style="width:100vw;">
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
                                                        <td></td>
                                                    </tr>

                                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer')?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>