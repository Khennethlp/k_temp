<footer class="main-footer text-sm">
  Developed by: Bruno Mars
  <div class="float-right d-none d-sm-inline-block">
    <strong>Copyright &copy;
      <script>
        var currentYear = new Date().getFullYear();
        if (currentYear !== 2024) {
          document.write("2024 - " + currentYear);
        } else {
          document.write(currentYear);
        };
      </script>.
    </strong>
    All rights reserved.
  </div>
</footer>
<?php
//MODALS
include '../../modals/logout_modal.php';
include '../../modals/add_users.php';
// include '../../modals/update_account.php';
// include '../../modals/import_accounts.php';
?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
  // $(document).ready(function() {
  // });
  document.addEventListener("DOMContentLoaded", function(){
    $('#myDataTable').DataTable();
  })
</script>

<script src="../../plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript" src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/popup_center.js"></script>
<script src="plugins/js/script.js"></script>
<script src="plugins/js/custom.js"></script>

</body>

</html>