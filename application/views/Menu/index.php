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
                <h1 class="mt-4">Menu</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <div class="container" style="width:100vw;">
                <?php
                    if ($_SESSION['level'] == 3) {
                    ?>
                        <a href="<?php echo base_url('Menu/tambahmenu') ?>" class="btn btn-primary mb-3">Tambah Menu</a>
                    <?php
                    }
                    ?>
                <div class="card shadow">
                    <div class="card-header text-center">
                        Data Menu
                    </div>

                    <!-- alert -->
                    <?php $tambah = $this->session->flashdata('tambah'); ?>
                    <?php if (isset($tambah)) : ?>
                        <div class="alert alert-success">
                            Berhasil Tambah Menu
                        </div>
                    <?php endif ?>
                    <?php $edit = $this->session->flashdata('edit'); ?>
                    <?php if (isset($edit)) : ?>
                        <div class="alert alert-warning">
                           Data Berhasil di edit
                        </div>
                    <?php endif ?>
                    <?php $hapus = $this->session->flashdata('hapus'); ?>
                    <?php if (isset($hapus)) : ?>
                        <div class="alert alert-danger">
                            Data Berhasil Hapus
                        </div>
                    <?php endif ?>
                    <!-- end alert -->


                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Id Menu</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <?php
                            if ($_SESSION['level'] == 3) {
                            ?>
                                <th>Aksi</th>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                        $count = 0;
                        foreach ($data as $row) {
                            $count = $count + 1;
                        ?>
                            <tr class="text-center">
                                <td><?php echo $row->id_masakan ?></td>
                                <td><?php echo $row->nama_masakan ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td>
                                    <?php if ($row->status_masakan == 1) { ?>
                                        <p class="badge bg-success text-light">Active</p>
                                    <?php } ?>
                                    <?php if ($row->status_masakan == 0) { ?>
                                        <p class="badge bg-danger text-light">Inactive</p>
                                    <?php } ?>
                                </td>
                                <?php
                                if ( $_SESSION['level'] == 3) {
                                ?>
                                    <td>
                                        <a href="<?php echo base_url('Menu/editmenu') ?>/<?php echo $row->id_masakan ?>" class="btn btn-warning">edit</a>
                                        <a href="<?php echo base_url('Menu/hapus') ?>/<?php echo $row->id_masakan ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>