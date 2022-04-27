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
            <h1 class="mt-4">Transaksi </h1>
                
                <div class="card shadow mt-5">
                    <div class="card-header">
                        Data Transaksi
                    </div>
                    <div class="container mt-3" style="width:100vw;">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Id Transaksi</th>
                            <th>User</th>
                            <th>Id Pesanan </th>
                            <th>Tanggal Transaksi</th>
                            <th>Uang</th>
                            <th>Total Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                            $count = 0;
                            foreach ($transaksi as $row) {
                                $count = $count + 1;
                        ?>

                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->nama_user ?></td>
                            <td><?php echo $row->id_pesanan_index2 ?></td>
                            <td><?php echo $row->tanggal_transaksi ?></td>
                            <td><?php echo $row->uang ?></td>
                            <td><?php echo $row->total_bayar ?></td>
                            <td><?php echo $row->kembalian ?></td>
                            <td>
                            <a href="<?php echo base_url('Pesanan/detailtransaksi') ?>/<?php echo $row->id_pesanan_index2 ?>" class="btn btn-warning">Detail</a>
                            <a href="<?php echo base_url('Pesanan/invoice') ?>/<?php echo $row->id_pesanan_index2 ?>" target="_blank"   class="btn btn-primary">struk</a>
                            <a href="<?php echo base_url('Transaksi/hapus') ?>/<?php echo $row->id_pesanan_index2 ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
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