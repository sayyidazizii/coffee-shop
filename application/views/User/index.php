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
                <h1 class="mt-4">User</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <div class="container" style="width:100vw;">
                <?php
                    if ($_SESSION['level'] == 1) {
                    ?>
                        <a href="<?php echo base_url('User/tambahuser') ?>" class="btn btn-primary mb-3">Tambah User</a>
                    <?php
                    }
                    ?>
                <div class="card shadow">
                    <div class="card-header text-center">
                        Data User
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
                            <th>Id User</th>
                            <th>Username</th>
                            <th>Nama User</th>
                            <th>Password</th>
                            <th>Level</th>
                            <?php
                            if ($_SESSION['level'] == 1) {
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
                                <td><?php echo $row->id_user ?></td>
                                <td><?php echo $row->username ?></td>
                                <td><?php echo $row->nama_user ?></td>
                                <td><?php echo $row->password ?></td>
                                <td>
                                    <?php if ($row->id_level == 1) { ?>
                                        <p class="badge bg-primary text-light">Admin</p>
                                    <?php } ?>
                                    <?php if ($row->id_level == 2) { ?>
                                        <p class="badge bg-secondary text-light">Kasir</p>
                                    <?php } ?>
                                    <?php if ($row->id_level == 3) { ?>
                                        <p class="badge bg-warning text-light">Manager</p>
                                    <?php } ?>
                                </td>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                ?>
                                    <td>
                                        <a href="<?php echo base_url('User/edituser') ?>/<?php echo $row->id_user ?>" class="btn btn-warning">edit</a>
                                        <a href="<?php echo base_url('User/hapus') ?>/<?php echo $row->id_user ?>" class="btn btn-danger">Hapus</a>
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