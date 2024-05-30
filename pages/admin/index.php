<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <!-- Alert -->
      <div class="alert alert-dismissible fade show" style="background-color: #88D498; color: #fff; " role="alert">
        <strong>Login Success!</strong> Hello, <?php echo isset($_SESSION['name']) == 'admin' ? 'Admin Khenneth' : 'Admin' ?>!
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- end of alert -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item ">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-tachometer"></i> DASHBOARD</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <ul class="ml-auto">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Search By:
                            </a>
                            <div class="dropdown-menu searchBy-item dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <button class="dropdown-item btn" id="show_date">
                                <i class="fas fa-calendar mr-2"></i>
                                Date
                              </button>
                            </div>
                          </li>
                        </ul>
                        <div class="col-lg-12 col-sm-4 col-md-7 col-6 ml-auto mt-2 mb-3 d-flex align-items-center">
                          <div class="input-group input-group-sm mr-3" style="height: 35px;">
                            <input type="search" id="search_index" class="form-control float-right" style="height: 40px; max-width: auto;" placeholder="Search">
                            <!-- <div class="input-group-append">
                              <button type="submit" class="btn btn-default" id="searchBtn" onclick="search();">
                                <i class="fas fa-search"></i>
                              </button>
                            </div> -->
                          </div>
                          <div class="d-flex">
                            <input type="text" name="" id="date_from" class="form-control mr-2" value="<?= $server_month; ?>" style="height: 40px;" placeholder="Date From" onfocus="(this.type='date')" onblur="(this.type='text')">
                            <input type="text" name="" id="date_to" class="form-control mr-2" style="height: 40px;" placeholder="Date To" onfocus="(this.type='date')" onblur="(this.type='text')">
                            <button type="submit" class="btn btn-default" id="search" onclick="search();">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                          <button class="btn text-danger" id="btnClear">Clear</button>
                        </div>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" id="tbl_div" style="height: 500px;">
                      <table class="table table-head-fixed text-nowrap" id="index_tbl">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Date</th>

                          </tr>
                        </thead>
                        <tbody id="index_table"> </tbody>
                      </table>
                      <div class="d-flex justify-content-sm-end">
                        <div class="dataTables_info" id="t_table_info" role="status" aria-live="polite">
                        </div>
                      </div>
                      <div class="d-flex justify-content-sm-center">
                        <button type="button" class="btn bg-gray-dark" id="btnNextPage" style="display:none;" onclick="get_next_page()">Load more</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <h5>another content here...</h5>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/dashboard_script.php';
?>