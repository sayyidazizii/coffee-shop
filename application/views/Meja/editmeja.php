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
                <h1 class="mt-4">Edit Meja</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <div class="container" style="width:100vw;">
                    <form action="<?php echo base_url('Meja/editdata') ?>" method="POST">
                        <div class="container" style="width:50vw">
                            <label class="form-label" hidden>ID Meja</label>
                            <input class="form-control" type="text" name="id_meja" value="<?php echo $meja->id_meja?>" hidden>
                            <label class="form-label">No Meja</label>
                            <input class="form-control" type="text" name="no_meja" value="<?php echo $meja->no_meja?>" required>
                            <label class="form-label">Kapasitas</label>
                            <input class="form-control" type="text" name="kapasitas" value="<?php echo $meja->kapasitas?>" required>
                            <label class="form-label">Ubah Status ?</label>
                            <select class="form-select mb-3" name="status_meja">
                                <option value="1">Ready</option>
                                <option value="0">NotReady</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('Meja')?>" class="btn btn-secondary">Batal</a>
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