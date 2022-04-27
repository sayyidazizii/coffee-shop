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
                    <h1>Laporan</h1>
               
                <div class="card mt-2">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <form action="" method="POST">
                                    <label class="form-label"><strong>Cari Nama Petugas: </strong></label>
                                    <input class="form-control" type="text" name="search" value="<?php echo $namauser; ?>" placeholder="cari berdasar nama petugas">
                                    <button class="btn btn-primary mt-2" type="submit">Tampilkan</button>
                                    <?php
                                    if (isset($namauser)) {
                                    ?>
                                        <a href="<?php echo base_url('Laporan/print') ?>/<?php echo $namauser; ?>" target="_blank" class="btn btn-danger mt-2">cetak berdasar nama</a>
                                    <?php } ?>
                                </form>
                            </div>
                            <div class="col">
                                <form action="" method="POST">
                                    <label class="form-label"><strong>Tanggal Awal : </strong></label>
                                    <input class="form-control" type="date" value="<?php echo $xtanggalA; ?>" name="tanggalA">
                            </div>
                            <div class="col">
                                <label class="form-label"><strong>Tanggal Akhir : </strong></label>
                                <input class="form-control" type="date" value="<?php echo $xtanggalB; ?>" name="tanggalB">
                                <button type="submit" class="btn btn-primary mt-2">Tampilkan</button>
                                <?php
                                if (isset($xtanggalA) && isset($xtanggalB)) {
                                ?>
                                    <a href="<?php echo base_url('Laporan/cetak') ?>/<?php echo $xtanggalA . '/' . $xtanggalB; ?>" target="_blank" class="btn btn-danger mt-2">cetak berdasar tanggal</a>
                                <?php } ?>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="container mt-3" style="width:100vw;">
                        <table class="table table-bordered">
                            <tr class="text-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer') ?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>