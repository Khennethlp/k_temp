<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Accounts Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item ">Accounts Management</li>
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
                            <h3 class="card-title"><i class="fas fa-file-alt"></i> Accounts Management</h3>
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
                                            <!-- <h3 class="card-title"></h3> -->
                                            <!-- <div class="card-tools">
                                                </div> -->
                                            <div class="row ">
                                                <div class="input-group input-group-sm" style="width: 200px;">
                                                    <input type="text" name="table_search" id="search_accounts" class="form-control float-right" style="height: 40px;" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default" onclick="search_accounts()">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="m-2"></div>
                                                <div class="input-group input-group-sm" style="width: 200px;">
                                                    <button class="btn btn-secondary mr-3" data-toggle="modal" data-target="#add_acc"><i class="fas fa-users"></i> Add</button>
                                                    <button class="btn btn-secondary mr-3"><i class="fas fa-print"></i> Print</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0" id="tbl_div" style="height: 500px; ">
                                            <table class="table table-head-fixed text-nowrap" id="tbl_k" style="width: 100%;" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID Number</th>
                                                        <th>Full Name</th>
                                                        <th>Username</th>
                                                        <th>Section</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead style="height: 310px; overflow-y: auto;">
                                                <tbody id="sample_tbl_accounts"> </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-sm-end m-2">
                                            <div class="dataTables_info" id="t_table_info" role="status" aria-live="polite">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-sm-center">
                                            <button type="button" class="btn bg-gray-dark mb-3" id="btnNextPage" style="display:none;" onclick="get_next_page()">Load more</button>
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
<?php include 'plugins/js/account_script.php'; ?>