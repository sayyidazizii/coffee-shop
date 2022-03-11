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
                <h1 class="mt-4">Dashboard</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <hr>
                <div class="container" style="width:100vw;">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Menu
                                    <div class="text-center">
                                        <?php echo $menu?>
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('Menu')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Pesanan
                                    <div class="text-center">
                                        1
                                    </div>
                                    </p>
                                    <a href="" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">Meja
                                    <div class="text-center">
                                        1
                                    </div>
                                    </p>
                                    <a href="" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="fw-bold">User
                                    <div class="text-center">
                                    <?php echo $user?>
                                    </div>
                                    </p>
                                    <a href="<?php echo base_url('User')?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>