<?php 
    include "navbar.php"; 

    if(isset($_GET['tblclassteacher_Id'])) {
      $id = $_GET['tblclassteacher_Id'];
    
    $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id JOIN tblteacher ON tblclassteacher.teacherId=tblteacher.Id WHERE tblclassteacher.Id='$id'");
    $row = mysqli_fetch_array($get);
    $classId = $row['tblclass_Id'];
    $classArmId = $row['tblclassarms_Id'];


    $act = mysqli_query($conn, "SELECT * FROM tblsessionterm JOIN tblterm ON tblsessionterm.termId=tblterm.Id WHERE isActive=1");
    $r_act = mysqli_fetch_array($act);
    $term_Id = $r_act['Id'];



    
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Class Attendance in (<?php echo $row['className'].' - '.$row['classArmName'];?>) Class <br>
      <small><?php echo $r_act['sessionName'].' - '.$r_act['termName'] ?> Semester</small>
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Class Attendance</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">

      <!-- Input Group -->
     <div class="row">
      <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        </div>



        <div class="table-responsive p-3">
          <form action="" method="POST">
            <h3 class="text-primary">Filter</h3>
            <div class="row">

              <div class="col-4">
                <div class="form-group">
                  <label for="">Student name</label>
                  <select name="admissionNumber" id="" required class="form-control">
                    <option value="" selected disabled>Select student</option>
                    <?php 

                      $fet = mysqli_query($conn, "SELECT *, tblstudents.Id AS tblstudents_Id, tblstudents.dateCreated AS tblstudents_dateCreated, tblclass.Id AS tblclass_Id, tblclassarms.Id AS tblclassarms_Id FROM tblstudents JOIN tblclass ON tblstudents.classId=tblclass.Id JOIN tblclassarms ON tblstudents.classArmId=tblclassarms.Id WHERE tblclass.Id='$classId' AND tblclassarms.Id='$classArmId' ORDER by lastName");
                      if(mysqli_num_rows($fet) > 0) {
                        while($rr = mysqli_fetch_array($fet)) {
                    ?>
                        <option value="<?php echo $rr['admissionNumber']; ?>"><?php echo $rr['firstName'].' '.$rr['otherName'].' '.$rr['lastName']; ?></option>
                    <?php } } else { ?>
                        <option value="" selected disabled>No record found</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-3">
                <label for="">From</label>
                <input type="date" class="form-control" name="from" required>
              </div>
              <div class="col-3">
                <label for="">To</label>
                <input type="date" class="form-control" name="to" required>
              </div>
              <div class="col-2">
                <label for="" class="text-white">To</label>
                <input type="submit" value="Filter" class="form-control bg-primary text-light" name="filter" required>
              </div>
            </div>
          </form>
          <hr>

          <?php 
            if(isset($_POST['filter'])) {
              $admissionNumber = $_POST['admissionNumber'];
              $from            = $_POST['from'];
              $to              = $_POST['to'];
          ?>
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>Student name</th>
                <th>Status</th>
                <th>Date created</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $dateTimeTaken = date('Y-m-d');
                    $fetch = mysqli_query($conn, "SELECT *, tblattendance.dateTimeTaken AS tblattendance_date FROM tblattendance JOIN tblclass ON tblattendance.classId=tblclass.Id JOIN tblclassarms ON tblattendance.classArmId=tblclassarms.Id JOIN tblstudents ON tblattendance.admissionNo=tblstudents.admissionNumber WHERE tblattendance.teacherId='$Id' AND tblattendance.classId='$classId' AND tblattendance.classArmId='$classArmId' AND tblattendance.admissionNo='$admissionNumber' AND tblattendance.dateTimeTaken BETWEEN '$from' AND '$to' GROUP BY tblattendance.admissionNo ORDER BY status DESC ");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['admissionNumber']; ?></td>
                    <td><?php echo $row['firstName'].' '.$row['otherName'].' '.$row['lastName']; ?></td>
                    <td>
                      <?php if($row['status'] == 1): ?>
                      <span class="badge badge-success">Present</span>
                      <?php else: ?>
                        <span class="badge badge-danger">Absent</span>
                      <?php endif; ?>
                    </td>
                    <td><?php echo date("F d, Y", strtotime($row['tblattendance_date'])); ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
          </table>
          <?php } else { ?>

          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>Student name</th>
                <th>Status</th>
                <th>Date created</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $dateTimeTaken = date('Y-m-d');
                    $fetch = mysqli_query($conn, "SELECT *, tblattendance.dateTimeTaken AS tblattendance_date FROM tblattendance 
                      JOIN tblclass ON tblattendance.classId=tblclass.Id 
                      JOIN tblclassarms ON tblattendance.classArmId=tblclassarms.Id 
                      JOIN tblstudents ON tblattendance.admissionNo=tblstudents.admissionNumber 
                      WHERE tblattendance.teacherId='$Id' AND tblattendance.classId='$classId' AND tblattendance.classArmId='$classArmId' AND DATE(dateTimeTaken)='$dateTimeTaken' 
                      GROUP BY tblattendance.admissionNo 
                      ORDER BY status DESC ");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['admissionNumber']; ?></td>
                    <td><?php echo $row['firstName'].' '.$row['otherName'].' '.$row['lastName']; ?></td>
                    <td>
                      <?php if($row['status'] == 1): ?>
                      <span class="badge badge-success">Present</span>
                      <?php else: ?>
                        <span class="badge badge-danger">Absent</span>
                      <?php endif; ?>
                    </td>
                    <td><?php echo date("F d, Y", strtotime($row['tblattendance_date'])); ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
          </table>
          <?php } ?>

        </div>




      </div>
    </div>
    </div>
  </div>

  </div>
</div>
</div>
<!-- Footer -->
<?php include "footer.php";?>
    

<script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php } ?>