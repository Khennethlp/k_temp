<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../../dist/img/logo.ico" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">&ensp;WEB &ensp;|&ensp; Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="index.php" class="d-block"><?= htmlspecialchars($_SESSION['name']); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/index.php") { ?>
            <a href="index.php" class="nav-link active">
            <?php } else { ?>
              <a href="index.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Dashboard
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/index2.php") { ?>
            <a href="index2.php" class="nav-link active">
            <?php } else { ?>
              <a href="index2.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-table"></i>
              <p>
                Datatable
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/pagination.php") { ?>
            <a href="pagination.php" class="nav-link active">
            <?php } else { ?>
              <a href="pagination.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Pagination
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/accounts.php") { ?>
            <a href="accounts.php" class="nav-link active">
            <?php } else { ?>
              <a href="accounts.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Accounts Management
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/barQr.php") { ?>
            <a href="barQr.php" class="nav-link active">
            <?php } else { ?>
              <a href="barQr.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Barcode & QR Generator
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/ts.php") { ?>
            <a href="ts.php" class="nav-link active">
            <?php } else { ?>
              <a href="ts.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-retweet"></i>
              <p>
                Table Switching
              </p>
              </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/load_more.php") { ?>
            <a href="load_more.php" class="nav-link active">
            <?php } else { ?>
              <a href="load_more.php" class="nav-link">
              <?php } ?>
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Load More
              </p>
              </a>
        </li>
        <?php include 'logout.php'; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>