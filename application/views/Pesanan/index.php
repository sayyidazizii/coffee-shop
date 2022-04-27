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
                        Berhasil Tambah data
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
                        Data Pesanan
                    </div>
                    <div class="container mt-3" style="width:100vw;">
                        <?php
                        if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1) {
                        ?>
                            <!-- tambah pesanan -->
                            <!-- Button trigger modal -->
                            <a href="<?php echo base_url('Pesanan/tambahpesanan') ?>" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pesanan</a>
                        <?php
                        }
                        ?>
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>ID Pesanan</th>
                                <th>Customer</th>
                                <th>Meja</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Status</th>
                                <?php
                                if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1) {
                                ?>
                                    <th>Aksi</th>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            foreach ($data as $row) {
                                if($row->status_pesanan ==  1){
                                  continue;
                                }
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $row->id_pesanan ?></td>
                                    <td><?php echo $row->customer ?></td>
                                    <td><?php echo $row->id_meja ?></td>
                                    <td><?php echo $row->tanggal ?> </td>
                                    <td><?php echo $row->nama_user ?> </td>
                                    <td>  <?php if ($row->status_pesanan == '0'){?>
                                    <p class="text-light badge bg-danger">Belum di bayar</p>
                                    <?php }?>

                                    </td>
                                    <?php
                                    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1) {
                                    ?>
                                        <td>
                                            <a href="<?php echo base_url('Pesanan/detailpesanan') ?>/<?php echo $row->id_pesanan ?>" class="btn btn-primary">Transaksi</a>
                                            <a href="<?php echo base_url('Pesanan/editpesanan') ?>/<?php echo $row->id_pesanan ?>" class="btn btn-warning">edit</a>
                                            <?php
                                            if ($_SESSION['level'] == 1) {
                                            ?>
                                                <a href="<?php echo base_url('Pesanan/hapus') ?>/<?php echo $row->id_pesanan ?>" class="btn btn-danger">Hapus</a>
                                            <?php
                                            }
                                            ?>
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
    <?php $this->load->view('Layout/footer')?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Pesanan/tambahdata') ?>" method="POST">
                    <label class="form-label">Nama Customer</label>
                    <input class="form-control" type="text" name="customer" required>
                    <label class="form-label">Meja</label>
                    <select class="form-select mb-3" name="id_meja">
                        <?php
                        foreach ($meja as $row) {
                        ?>
                            <option value="<?php echo $row->id_meja ?>"><?php echo $row->id_meja ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="form-label">Nama Petugas</label>
                    <input class="form-control" type="text" name="nama_user" value="<?php echo $_SESSION['nama_user'] ?>" readonly>
                    <input class="form-control" type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>