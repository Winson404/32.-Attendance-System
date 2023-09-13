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
        <form action="" method="POST">
          <div class="col-2 m-2 float-right">
            <a href="export.php?classTeacherId=<?php echo $id; ?>&&teacherId=<?php echo $Id; ?>&&classId=<?php echo $classId; ?>&&classArmId=<?php echo $classArmId; ?>" class="btn btn-success text-light d-block">Export (xlx)</a>
          </div>
        </form>
        <div class="table-responsive p-3">
          
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

        </div>




      </div>
    </div>
    </div>
  </div>

  </div>
</div>
</div>
<!-- Footer -->
<?php include "footer.php"; } ?>
    
