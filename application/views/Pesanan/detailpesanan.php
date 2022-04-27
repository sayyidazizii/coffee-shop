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

                <div class="row">
                    <div class="col">
                        <h3><em><strong>Pesanan <?php echo $pesanan->customer ?></strong></em></h3>
                        <a class="btn btn-primary" href="<?php echo base_url('Pesanan') ?>"> Kembali</a>
                    </div>
                    <div class="col" style="position: relative;margin-left:30%">
                        <form action="" method="POST">
                            <label class="fw-bold">Cari nama Menu</label>
                            <input type="text" name="search" class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">cari</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="container" style="width:100vw;">
                    <!-- <div class="container"> -->
                        <!-- <div class="row">
                            <div class="col-sm-5 col-md-6">
                                <div class="container"> -->
                        <div class="row row-cols-1 row-cols-md-6 g-1">
                            <?php
                            foreach ($menu as $row) {
                            ?>
                                <div class="col">
                                    <form action="<?php echo base_url('Pesanan/order') ?>" method="POST" target="_top">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="fw-bold text-center"><?php echo $row['nama_masakan'] ?>
                                                </p>
                                                <input class="form-control mb-2" type="text" name="id_pesanan_index" value="<?php echo $id ?>" hidden>
                                                <img class="img-top" src="<?php echo base_url('assets/img/' . $row['image']) ?>" style="positio:relative;margin-left:20%">
                                                <p class="fw-bold text-center">
                                                    <?php echo $row['harga'] ?>
                                                </p>
                                                <input class="form-control mb-2" type="text" name="id_masakan" value="<?php echo $row['id_masakan'] ?>" hidden>
                                                <input class="form-control mb-2" type="text" name="nama_masakan" value="<?php echo $row['nama_masakan'] ?>" hidden>
                                                <input hidden class="form-control mb-2" type="text" name="jumlah_harga" value="<?php echo $row['harga'] ?>" readonly>
                                                <div class="row">
                                                    <div class="col">
                                                        <input class="form-control" type="number" name="jumlah_pesanan" placeholder="jml">
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-primary" type="submit">Beli</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                        <!-- </div>
                    </div> -->
                </div>
                <!-- <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                <div class="container"> -->
                <div class="card shadow mt-2">
                    <div class="card-header">Menu yang di pesan</div>
                    <div class="card-body">
                        <div class="text-center">
                            <table class="table table-border">
                                <tr>
                                    <th hidden>id Detail</th>
                                    <th hidden>Id pesanan</th>
                                    <th hidden>Id Menu</th>
                                    <th>Nama Menu</th>
                                    <th>jumlah</th>
                                    <th>jumlah Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                $jumlah = 0;
                                $indexpesanan = 0;
                                foreach ($pesan as $row) {
                                    $jumlah += $row->jumlah_harga;
                                    $indexpesanan = $row->id_pesanan_index;
                                ?>
                                    <tr>
                                        <td hidden><?= $row->id_pesan ?></td>
                                        <td hidden><?= $row->id_pesanan_index ?></td>
                                        <td hidden><?= $row->id_masakan ?></td>
                                        <td><?= $row->nama_masakan ?></td>
                                        <td><?= $row->jumlah_pesanan ?></td>
                                        <td><?php echo $row->jumlah_harga ?></td>
                                        <td>
                                            <a class="btn btn-danger" href="<?php echo base_url('Pesanan/hapusorder') ?>/<?php echo $row->id_pesan ?>">Hapus</a>
                                        </td>
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
                        <!-- ubah status pesanan -->
                        <!-- alert -->

                        <?php $edit = $this->session->flashdata('edit'); ?>
                        <?php if (isset($edit)) : ?>
                            <div class="alert alert-success mt-2">
                                berhasil edit status
                            </div>
                        <?php endif ?>
                        <!-- end alert -->


                        <!-- alert jika uang kurang -->
                        <?php $gagal = $this->session->flashdata('gagal'); ?>
                        <?php if (isset($gagal)) : ?>
                            <div class="alert alert-danger mt-2">
                                Uang Tidak Cukup
                            </div>
                        <?php endif ?>



                        <!-- simpan data order ke dalam transaksi-->
                        <strong>Transaksi</strong>
                        <hr>
                        <form action="<?php echo base_url('Pesanan/saveorder') ?>" method="POST">
                            <input class="form-control mb-2" type="text" name="id_user" value="<?php echo $pesanan->id_user ?>" hidden>
                            <input class="form-control mb-2" type="text" name="nama_user" value="<?php echo $pesanan->nama_user ?>" hidden>
                            <input class="form-control mb-2" type="text" name="id_pesanan_index2" value="<?php echo $indexpesanan ?>" hidden>
                            <label class="form-label">Tanggal Pesan</label>
                            <input class="form-control mb-2" type="text" name="tanggal_transaksi" value="<?php echo $pesanan->tanggal ?>" readonly>

                            <!-- !!!ubah status terlebih dahulu,lalu masukan jumlah uang -->
                            <?php $edit = $this->session->flashdata('edit'); ?>
                            <?php if ($pesanan->status_pesanan == '1') : ?>
                                <label class="form-label">Uang</label>
                                <input class="form-control mb-2" type="number" name="uang" required>
                            <?php endif ?>

                            <label class="form-label">Total Bayar</label>
                            <input class="form-control mb-2" type="number" name="total_bayar" value="<?php echo $jumlah ?>" readonly>
                            <label class="form-label" hidden>Kembalian</label>
                            <input class="form-control mb-2" type="number" name="kembalian" hidden readonly>
                            <label class="form-label"><strong> !</strong> Ubah Status Pembayaran Pesanan terlebih dahulu</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <!-- Button trigger modal edit status pesanan -->
                                    <a class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-required="">! Status</a>
                                </div>
                                <div class="col">
                                    <!-- ubah status terlebih dahulu,lalu simpan transaksi -->

                                    <?php if ($pesanan->status_pesanan == '1') : ?>
                                        <button class="btn btn-primary" type="submit">save</button>
                                    <?php endif ?>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <?php $this->load->view('Layout/footer') ?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('Pesanan/editstatus') ?>" method="POST">
                    <input class="form-control" type="text" name="id_pesanan" value="<?php echo $pesanan->id_pesanan ?>" hidden>
                    <label class="form-label">Nama Customer</label>
                    <input class="form-control" type="text" name="customer" value="<?php echo $pesanan->customer ?>" readonly required>
                    <input class="form-control" type="text" name="id_meja" value="<?php echo $pesanan->id_meja ?>" hidden readonly>
                    <input class="form-control" type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" hidden readonly>
                    <label class="form-label">Tanggal</label>
                    <input class="form-control" type="text" name="tanggal" value="<?php echo $pesanan->tanggal ?>" readonly required>
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status_pesanan">
                        <option value="1">Bayar Langsung</option>
                        <option value="0">Belum dibayar</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>