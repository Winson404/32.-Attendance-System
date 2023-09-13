<?php include 'navbar.php'; ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Instructors' courses</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Instructors' courses</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-5 p-4">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_activity">Add</button>
            </div>
              <div class="table-responsive">
                <table class="table table-flush table-hover" id="dataTableHover">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone No.</th>
                      <th>Program</th>
                      <th>Course Name</th>
                      <th>Date created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i = 1;
                      $status="";
                      $fetch = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblteacher.Id AS tblteacher_Id, tblclassarms.Id AS classArms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblteacher ON tblclassteacher.teacherId=tblteacher.Id JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id");
                      while($row = mysqli_fetch_array($fetch)) {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['firstName']; ?></td>
                      <td><?php echo $row['lastName']; ?></td>
                      <td><?php echo $row['emailAddress']; ?></td>
                      <td><?php echo $row['phoneNo']; ?></td>
                      <td><?php echo $row['className']; ?></td>
                      <td><?php echo $row['classArmName']; ?></td>
                      <td><?php echo date("F d, Y", strtotime($row['dateCreated'])); ?></td>
                      <td>
                        <a class="btn btn-success btn-sm" href="createClassTeacher_update.php?tblclassteacher_Id=<?php echo $row['tblclassteacher_Id']; ?>">Update</a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['tblclassteacher_Id']; ?>">Delete</button>
                      </td>
                    </tr>
                    <?php include 'createClassTeacher_delete.php'; } ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'createClassTeacher_add.php'; ?>   
<?php include 'footer.php'; ?> 