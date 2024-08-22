<?php
//SESSION 
include '../../process/login.php';
if (!isset($_SESSION['username'])) {
  header('location:../../');
  exit;
} else if ($_SESSION['role'] == 'user') {
  header('location: ../../page/user/pagination.php');
  exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
  <link rel="icon" href="../../dist/img/logo.png" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../../dist/css/font.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/dist/sweetalert2.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.1.0/css/dataTables.scroller.min.css"/>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/scroller/2.1.0/js/dataTables.scroller.min.js"></script>
 
  <style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #536A6D;
      width: 50px;
      height: 50px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    .btn-file {
      position: relative;
      overflow: hidden;
    }

    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      cursor: inherit;
      display: block;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(1080deg);
      }
    }

    /* ============================================================== */
    /* QR Code */
    body .user-input-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 40%;
    }

    body .user-input-section .user-input {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    body .user-input-section .user-input label {
      font-size: 1.5rem;
      font-family: "Poppins", sans-serif;
    }

    body .user-input-section .user-input input {
      width: 80%;
      max-width: 35rem;
      font-size: 16px;
      outline: none;
      border: none;
      border-radius: 0.5rem;
      background-color: #666666;
      padding: 1.5rem 1rem;
      margin: 1rem 1rem 2rem 1rem;
      color: #fff;
    }

    body .user-input-section .user-input input::placeholder {
      color: #fff;
    }

    body .button {
      outline: none;
      border: none;
      border-radius: 0.5rem;
      padding: 1.5rem 2.5rem;
      margin-bottom: 3rem;
      background-color: #5b92799d;
      background-color: #92dce5;
      color: black;
      font-family: sans-serif;
      font-size: 1.6rem;
    }

    button:hover {
      opacity: .7;
    }

    body .qr-code-container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 40%;
    }

    body .qr-code-container .qr-code {
      display: flex;
      border-radius: 1rem;
      background-color: #7c7c7c33;
      width: fit-content;
      flex-direction: column;
      justify-content: space-between;
      padding: 2rem;
    }

    body .qr-code-container .qr-code button {
      display: flex;
      justify-content: center;
      background-color: #1f1f1f;
      color: #eae6e5;
      border: none;
      outline: none;
      width: 100%;
      margin-top: 2.5rem;
      border-radius: 1rem;
    }

    body .qr-code-container .qr-code button a {
      font-family: sans-serif;
      font-size: 1.5rem;
      width: 100%;
      height: 100%;
      text-decoration: none;
      color: #eae6e5;
      padding: 1rem;
    }

    /* ============================================================== */
    /* ============================================================== */
    .contents {
      width: 400px;
      position: relative;
      top: 0;
      left: 50%;
      transform: translate(0, -100%);
      background-color: #001f3f;
      padding: 20px 10px;
      text-align: center;
      border-radius: 10px;
    }

    input {
      width: 300px;
      color: white;
      padding: 15px 10px;
      border: 1px solid rgb(52, 51, 51);
      background: #083358;
      border-radius: 10px;
      font-size: 17px;
      outline: none;
    }

    input:focus {
      border: 1px solid rgb(4, 84, 213);
    }

    #barcode {
      box-shadow: 0 0 20px rgb(8, 51, 88, 0.3);
      width: 300px;
      border-radius: 10px;
      margin: 30px 0px 30px 0px;
    }

    #btn {
      padding: 12px 40px;
      background-color: #ffd717;
      cursor: pointer;
      color: #000;
      font-size: 17px;
      border: none;
      border-radius: 3px;
    }

    .downloadLink {
      margin-top: 10px;
      padding: 12px;
      background-color: #ffd717;
      cursor: pointer;
      /* color: #000;
      font-size: 17px;
      border: none;
      border-radius: 3px; */
    }

    /* ============================================================== */
    .active {
      background-color: #AA2138 !important;
      border-bottom: 2px solid #ffffff !important;
    }

    .b-border {
      border-bottom: 2px solid #AA2138 !important;
    }

    ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    li a {
      padding: 5px;
      display: inline-flex;
      /* Ensure the padding and width apply correctly */

    }

    .searchBy-item {
      padding: 2px 0;
      max-width: 100px;
      /* margin: 0 0px; */
    }
  </style>
</head>
<!-- sidebar-collapse -->

<body class="hold-transition  layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="" src="../../dist/img/spinner1.gif" alt="logo" height="60" width="60">
      <noscript>
        <br>
        <span>We are facing <strong>Script</strong> issues. Kindly enable <strong>JavaScript</strong>!!!</span>
        <br>
        <span>Call IT Personnel Immediately!!! They will fix it right away.</span>
      </noscript>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <div class="row">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-print bg-secondary p-2 rounded-circle" title="Print All"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-table bg-secondary p-2 rounded-circle" title="Print Table"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-download bg-secondary p-2 rounded-circle" title="Export CSV"></i>
            </a>
          </li> -->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-file-alt mr-1 text-white"></i> File
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

              <!-- ACCESS DASHBOARD/INDEX PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/index.php") { ?>
                <button class="dropdown-item" onclick="printTable_index()">
                  <i class="fas fa-print mr-2"></i>
                  Print (Default)
                </button>

                <button class="dropdown-item" onclick="exportCSV('index_tbl')">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (Default)
                </button>
              <?php } ?>

              <!-- ACCESS DATA TABLE PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/index2.php") { ?>
                <button class="dropdown-item" onclick="printTable()">
                  <i class="fas fa-print mr-2"></i>
                  Print (DT)
                </button>

                <button class="dropdown-item" onclick="exportCSV('myDataTable')">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (DT)
                </button>
              <?php } ?>

              <!-- ACCESS PAGINATION PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/pagination.php") { ?>
                <button class="dropdown-item" onclick="printTable()">
                  <i class="fas fa-print mr-2"></i>
                  Print (Pagination)
                </button>

                <button class="dropdown-item" onclick="exportCSV('pagination_tbl')">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (Pagination)
                </button>
              <?php } ?>

              <!-- ACCESS ACCOUNTS PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/accounts.php") { ?>
                <button class="dropdown-item" id="printTable_accounts" onclick="printTable_accounts()">
                  <i class="fas fa-print mr-2"></i>
                  Print (Account)
                </button>

                <button class="dropdown-item" onclick="exportCSV('tbl_k')">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (Account)
                </button>
              <?php } ?>

              <!-- ACCESS Barcode & QR PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/barQr.php") { ?>
                <button class="dropdown-item" id="printTable_accounts" onclick="printTable_accounts()">
                  <i class="fas fa-print mr-2"></i>
                  Print (Barcode/QRCode)
                </button>

                <button class="dropdown-item" onclick="exportCSV_accounts()">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (Barcode/QRCode)
                </button>
              <?php } ?>

              <!-- ACCESS Table Switching PAGE -->
              <?php if ($_SERVER['REQUEST_URI'] == "/k_temp/pages/admin/ts.php") { ?>
                <button class="dropdown-item" id="printTable_accounts" onclick="printTable_accounts()">
                  <i class="fas fa-print mr-2"></i>
                  Print (TS)
                </button>

                <button class="dropdown-item" onclick="exportCSV_accounts()">
                  <i class="fas fa-file-csv mr-2"></i>
                  Export CSV (TS)
                </button>
              <?php } ?>

            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle no-caret" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- <i class="fas fa-ellipsis-v mr-2"></i> -->
              <i class="fas fa-cog mr-1 text-white"></i> Theme
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1">
                  <label class="custom-control-label " id="theme_label" for="customSwitch1">Dark Mode</label>
                </div>
              </a>
            </div>
          </li>

          <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
        </div>
      </ul>
    </nav>
    <!-- /.navbar -->