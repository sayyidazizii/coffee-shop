  <!-- Sidebar-->
  <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush ">
      <a class="list-group-item list-group-item-action list-group-item-light p-5 text-center bg-primary text-light fw-bolder" href="<?php echo base_url('Dashboard') ?>">Kasir Cafe</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Dashboard') ?>">Dashboard</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Menu') ?>">Menu</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Meja') ?>">Meja</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Pesanan')?>">Pesanan</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Transaksi')?>">Transaksi</a>

      <!-- hak akses admin dan manager -->
      <?php
      if ($_SESSION['level'] == '1' or $_SESSION['level'] == '3') {
      ?>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Laporan')?>">Laporan</a>
      <?php
      }
      ?>

      <!-- hak akses admin  -->
      <?php
      if ($_SESSION['level'] == '1') {
      ?>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('User') ?>">User</a>
      <?php
      }
      ?>

      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Log/profil') ?>">Login as : <?php echo $_SESSION['username'] ?></a>
    </div>
  </div>