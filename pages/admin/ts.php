<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Table Switching</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item ">Table Switching</li>
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
              <h3 class="card-title"><i class="fa fa-tachometer"></i> Table Switching</h3>
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
                        <div class="col-sm-4 ml-auto mt-2 d-flex align-items-center">
                          <div class="input-group input-group-sm mr-3" style="height: 35px;">
                            <input type="text" id="search_index" class="form-control float-right"  style="height: 35px;" placeholder="Search">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 500px;">
                      <table class="table table-head-fixed text-nowrap" id="acc_tbl">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Date</th>
                            
                          </tr>
                        </thead>
                        <tbody id="index_table">
                          
                        </tbody>
                      </table>
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