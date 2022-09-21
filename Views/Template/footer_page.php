<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script>
      const base_url = "<?php echo base_url();?>"
</script>
<script src="<?php echo media(); ?>js/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo media(); ?>js/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo media(); ?>js/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo media(); ?>js/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo media(); ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/pdfmake/vfs_fonts.js"></script>

<script src="<?php echo media(); ?>css/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo media(); ?>css/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo media(); ?>js/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<!-- Select2 -->
<script src="<?php echo media(); ?>js/plugins/select2/select2.min.js"></script>
<!-- Tinymce -->
<script src="<?php echo media(); ?>js/plugins/tinymce/tinymce.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo media(); ?>js/adminlte.min.js"></script>
<script src="<?php echo media(); ?>js/functions.js"></script>
<?php

    if (isset($data['page_functions_js'])) {
?>
<script src="<?php echo media(); ?>js/<?= $data['page_functions_js'] ?>"></script>
<?php
    }

?>
</body>
</html>