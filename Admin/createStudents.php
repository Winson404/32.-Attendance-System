<?php include 'navbar.php'; ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student records</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student records</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-5 p-4">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_activity">Add</button>
            </div>
              <table class="table table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Admission #</th>
                    <th>Program</th>
                    <th>Course</th>
                    <th>Date Created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $fetch = mysqli_query($conn, "SELECT *, tblstudents.Id AS tblstudents_Id, tblstudents.dateCreated AS tblstudents_dateCreated, tblclass.Id AS tblclass_Id, tblclassarms.Id AS tblclassarms_Id FROM tblstudents JOIN tblclass ON tblstudents.classId=tblclass.Id JOIN tblclassarms ON tblstudents.classArmId=tblclassarms.Id");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['firstName'].' '.$row['otherName'].' '.$row['lastName']; ?></td>
                    <td><?php echo $row['admissionNumber']; ?></td>
                    <td><?php echo $row['className']; ?></td>
                    <td><?php echo $row['classArmName']; ?></td>
                    <td><?php echo date("F d, Y", strtotime($row['dateCreated'])); ?></td>
                    <td>
                      <a class="btn btn-success btn-sm" href="createStudents_update.php?tblstudents_Id=<?php echo $row['tblstudents_Id']; ?>">Update</a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['tblstudents_Id']; ?>">Delete</button>
                    </td>
                  </tr>
                  <?php include 'createStudents_delete.php'; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

<?php include 'createStudents_add.php'; ?>   
<?php include 'footer.php'; ?> 