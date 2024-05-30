<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pagination</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item ">Pagination</li>
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
                            <h3 class="card-title"><i class="fas fa-file-alt"></i> Pagination</h3>
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
                                            <h3 class="card-title"></h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 200px;">
                                                    <input type="search" id="sample_search" class="form-control float-right" style="height: 40px;" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default" onclick="search_sample_tbl(1)">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table class="table table-head-fixed text-nowrap" id="pagination_tbl">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="sample_tbl">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pagination -->
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-9 col-9">
                                    <div class="dataTables_info pl-4" id="sample_table_info" role="status" aria-live="polite"></div>
                                    <input type="hidden" id="count_rows">
                                </div>
                                <div class="col-sm-12 col-md-1 col-1">
                                    <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-flat rounded mx-4" onclick="get_prev_page()">Prev</button>
                                </div>
                                <div class="col-sm-12 col-md-1 col-1">
                                    <input type="text" list="sample_table_paginations" class="form-control" id="sample_table_pagination">
                                    <datalist id="sample_table_paginations"></datalist>
                                </div>
                                <div class="col-sm-12 col-md-1 col-1 rounded">
                                    <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-flat mr-3 rounded" onclick="get_next_page()">Next</button>
                                </div>
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
<?php include 'plugins/js/pagination_script.php'; ?>