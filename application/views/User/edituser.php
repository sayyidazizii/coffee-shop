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
                <h1 class="mt-4">Edit User</h1>
                <p class="text-primary"><?php echo $_SESSION['username'] ?></p>
                <div class="container" style="width:100vw;">
                    <form action="<?php echo base_url('User/editdata') ?>" method="POST">
                        <div class="container" style="width:50vw">
                            <label class="form-label" hidden>Id User</label>
                            <input class="form-control" type="text" name="id_user" value="<?php echo $user->id_user?>" hidden>
                            <label class="form-label">Nama User</label>
                            <input class="form-control" type="text" name="nama_user" value="<?php echo $user->nama_user?>" required>
                            <label class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $user->username?>" required>
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" value="<?php echo $user->password?>" required>
                            <label class="form-label">Level</label>
                            <select class="form-select mb-3" name="id_level">
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3">Manager</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('User')?>" class="btn btn-secondary">Batal</a>
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