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
<script src="<?php echo media(); ?>js/plugins/datatables-bs4/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-responsive/dataTables.responsive.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-responsive/responsive.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-buttons/buttons.bootstrap4.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-buttons/buttons.html5.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?php echo media(); ?>js/plugins/datatables-buttons/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo media(); ?>js/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<!-- Bootstrap Select2 -->
<script src="<?php echo media(); ?>js/plugins/bootstrap-select/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo media(); ?>js/adminlte.min.js"></script>

<?php
    switch ($data['page_name']) {
        case 'Roles':
?>
        <!-- Functions Roles -->
        <script src="<?php echo media(); ?>js/functions_roles.js"></script>
<?php
            break;
        case 'Usuarios':
?>
        <!-- Functions Usuarios -->
        <script src="<?php echo media(); ?>js/functions_usuarios.js"></script>
<?php           
            break;
    }
?>

</body>
</html>