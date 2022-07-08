<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo media(); ?>js/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo media(); ?>js/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!-- AdminLTE App -->
<script src="<?php echo media(); ?>js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>