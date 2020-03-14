 <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script src="plugins/select2/select2.full.min.js"></script>
    

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- InputMask -->

    <script>
      $(function () {
      //Initialize Select2 Elements
        $(".select2").select2();

        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
          $('#date').datepicker({
              format: "dd-mm-yyyy"
          });  
      });
  </script>

 <!--reopsitory form-->
<script type="text/javascript">
  $(document).ready(function () {
      $('#Date_Of_Purchase').datepicker({
          format: "dd-mm-yyyy"
      });  
  });
 </script>

 <!--datetime formage-->
<script type="text/javascript">
  $(document).ready(function () {
      $('#Active_From').datepicker({
          format: "dd-mm-yyyy"
      });  
  });
  $(document).ready(function () {
      $('#Active_To').datepicker({
          format: "dd-mm-yyyy"
      }); 
  });
  $(document).ready(function () {
      $('#Active_Date').datepicker({
          format: "dd-mm-yyyy"
      });  
  });

$(document).ready(function () {
      $('#Date').datepicker({
          format: "dd-mm-yyyy"
      });  
  });
  

 </script>
 
 <!--ck editor-->
 <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
