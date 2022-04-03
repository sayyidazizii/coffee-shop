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

                <!-- alert -->
                <?php $tambah = $this->session->flashdata('tambah'); ?>
                <?php if (isset($tambah)) : ?>
                    <div class="alert alert-success mt-2">
                        Berhasil Tambah Meja
                    </div>
                <?php endif ?>
                <?php $edit = $this->session->flashdata('edit'); ?>
                <?php if (isset($edit)) : ?>
                    <div class="alert alert-warning mt-2">
                        Data Berhasil di edit
                    </div>
                <?php endif ?>
                <?php $hapus = $this->session->flashdata('hapus'); ?>
                <?php if (isset($hapus)) : ?>
                    <div class="alert alert-danger mt-2">
                        Data Berhasil Hapus
                    </div>
                <?php endif ?>
                <!-- end alert -->

                <div class="card shadow mt-5">
                    <div class="card-header">
                        Log Aktivitas User
                    </div>
                    <div class="container mt-3" style="width:100vw;">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th hidden>Id Aktivitas</th>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Tipe Log</th>
                                <th>Waktu</th>
                                <th>Aktivitas</th>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                ?>
                                    <th>Opsi</th>
                                <?php } ?>
                            </tr>
                            <?php

                            $no = $this->uri->segment('3') + 1;
                            foreach ($log as $row) {

                            ?>
                                <tr class="text-center">
                                    <td hidden><?php echo $row['id_log'] ?></td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['log_user'] ?></td>
                                    <td><?php echo $row['log_tipe'] ?></td>
                                    <td><?php echo $row['log_time']; ?></td>
                                    <td><?php echo $row['log_desc']; ?></td>
                                    <?php
                                    if ($_SESSION['level'] == 1) {
                                    ?>
                                        <td>
                                            <a href="<?php echo base_url('Log/editlog') ?>/<?php echo $row['id_log'] ?>" class="btn btn-warning">edit</a>
                                            <a href="<?php echo base_url('Log/hapus') ?>/<?php echo $row['id_log'] ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <nav class="text-center" aria-label="Page navigation">
                            <?php
                            echo $this->pagination->create_links();
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer') ?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>