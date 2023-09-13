   <!-- Footer -->
   <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <?php echo "Zamboanga Del Sur Provincial Government College MAIN" ?>
        <span> &copy; 
          <?php
            date_default_timezone_set('Asia/Manila');
            $time = date('h:i A ');
            $month = date('F ');
            $day = date('j, ');
            $year = date('Y');
          ?>
          <script>
            document.write('<?php echo $time; ?>');
            document.write('<?php echo $month; ?>');
            document.write('<?php echo $day; ?>');
            document.write('<?php echo $year; ?>');
          </script>
        </span>
      </div>
    </div>
  </footer>     
        <!-- Footer -->
  </div>
</div>
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>  
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>


