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
                <h1 class="mt-4">Profil </h1>

                <div class="card shadow mt-3">
                    <div class="card-header">
                        Profil Saya
                    </div>
                    <div class="container mt-3" style="width:100vw;">
                        <p>
                            Anda adalah 
                            <div class="fw-bold mb-2">
                            <?php echo $_SESSION['nama_user']?>
                            </div>
                            dengan level 
                            <?php if($_SESSION['level'] == '1') { ?>
                                <div class="badge bg-primary">Admin</div>
                                <div class="text-bold">Anda memiliki Hak Akses Ke semua data</div>
                            <?php }  ?>
                            <?php if($_SESSION['level'] == '2') { ?>
                                <div class="badge bg-warning">Kasir</div>
                                <div class="text-bold">Anda memiliki Hak Akses Data transaksi</div>
                            <?php }  ?>
                            <?php if($_SESSION['level'] == '3') { ?>
                                <div class="badge bg-secondary">Manager</div>
                                <div class="text-bold">Anda memiliki Hak Akses ke data menu dan log petugas</div>
                            <?php }  ?>

                            <strong>Selamat Bekerja , Utamakan Kejujuran dan semangat bekerja.</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer') ?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>