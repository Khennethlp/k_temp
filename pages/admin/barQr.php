<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barcode & Qr Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item ">Barcode & Qr Code</li>
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
                            <h3 class="card-title"><i class="fa fa-tachometer"></i> Barcode & Qr Code</h3>
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

                                        <div class="card-body table-responsive p-0" style="height: 800px;">
                                            <section>
                                                <div class="user-input-section">
                                                    <section class="heading">
                                                        <div class="title">QRcodes</div>
                                                        <div class="sub-title">Generate QRCode for anything!</div>
                                                    </section>
                                                    <section class="user-input">
                                                        <input type="text" placeholder="Type something..." name="input_text" id="input_text" autocomplete="off">
                                                        <button class="button" type="submit">Generate</button>
                                                    </section>
                                                </div>
                                                <div class="qr-code-container">
                                                    <div class="qr-code"></div>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="bg"></div>
                                                <div class="contents">
                                                    <input type="text" id="text" placeholder="Type here...">
                                                    <svg id="barcode"></svg>
                                                    <button id="btn">Generate</button>
                                                    <a id="downloadLink" class="downloadLink" download="barcode.png" style="display: none;">Download Barcode</a>
                                                </div>
                                            </section>
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
<?php include 'plugins/js/barQr_script.php'; ?>