  <!-- Sidebar-->
  <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush ">
      <a class="list-group-item list-group-item-action list-group-item-light p-5 text-center bg-primary text-light fw-bolder" href="<?php echo base_url('Dashboard') ?>">Coffee Shop</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Dashboard') ?>">Dashboard</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('Menu') ?>">Menu</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Pesanan</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Transaksi</a>

      <!-- hak akses admin dan manager -->
      <?php
      if ($_SESSION['level'] == '1' or $_SESSION['level'] == '3') {
      ?>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Laporan</a>
      <?php
      }
      ?>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('User') ?>">User</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Login as : <?php echo $_SESSION['username'] ?></a>
    </div>
  </div>