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

             <!-- alert session -->
             <?php $sukses = $this->session->flashdata('sukses'); ?>
                        <?php if (isset($sukses)) : ?>
                            <div class="alert alert-success mt-2">
                                Selamat<strong> Login Berhasil</strong>
                            </div>
                        <?php endif ?>

                <h1 class="mt-4">Dashboard </h1>
               <div class="text-dark">Selamat datang <strong class="text-primary"><?php echo $_SESSION['username'];?></strong></div>
                <hr>
                <div class="container" style="width:100vw;">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Menu
                                    <div class="text-center">
                                        <h3 class="text-primary"><?php echo $menu?></h3>
                                        
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('Menu')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Pesanan Belum dibayar
                                    <div class="text-center">
                                    <h3 class="text-danger"><?php echo $pesanan?></h3>
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('Pesanan')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Meja Ready
                                    <div class="text-center">
                                    <h3 class="text-success"><?php echo $meja?></h3>
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('Meja')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Transaksi
                                    <div class="text-center">
                                    <h3 class="text-warning"><?php echo $transaksi?></h3>
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('Transaksi')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer')?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>