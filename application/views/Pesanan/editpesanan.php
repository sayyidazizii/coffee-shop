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
                <h1 class="mt-4">Edit Pesanan</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <div class="container" style="width:100vw;">
                    <form action="<?php echo base_url('Pesanan/editdata') ?>" method="POST">
                        <div class="container" style="width:50vw">
                            <label class="form-label" hidden>Id Pesanan</label>
                            <input class="form-control" type="text" name="id_pesanan" value="<?php echo $pesanan->id_pesanan ?>" hidden>
                            <label class="form-label">Nama Customer</label>
                            <input class="form-control" type="text" name="customer" value="<?php echo $pesanan->customer ?>"  required>
                            <label class="form-label">Id Meja</label>
                            <input class="form-control" type="text" name="id_meja" value="<?php echo $pesanan->id_meja ?>" readonly>
                            <label class="form-label">User</label>
                            <input class="form-control" type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" readonly>
                            <label class="form-label">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" required>
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status_pesanan">
                                <option value="1">Bayar Langsung</option>
                                 <option value="0">Belum dibayar</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="<?php echo base_url('Pesanan') ?>" class="btn btn-secondary mt-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Layout/footer')?>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>