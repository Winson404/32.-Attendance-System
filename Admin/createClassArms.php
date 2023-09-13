<?php include 'navbar.php'; ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course records</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Course records</li>
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
                    <th>Program Name</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $fetch = mysqli_query($conn, "SELECT *, tblclassarms.Id AS tblclassarms_Id FROM tblclassarms JOIN tblclass ON tblclassarms.classId=tblclass.Id");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['className']; ?></td>
                    <td><?php echo $row['classArmName']; ?></td>
                    <td>
                      <?php 
                        if ($row['isAssigned'] == 1) {
                          echo $status = "Assigned";
                        } else { 
                          echo $status = "UnAssigned";
                        } 
                      ?>
                    </td>
                    <td>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#update<?php echo $row['tblclassarms_Id']; ?>">Update</button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['tblclassarms_Id']; ?>">Delete</button>
                    </td>
                  </tr>
                  <?php include 'createClassArms_update_delete.php'; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

<?php include 'createClassArms_add.php'; ?>   
<?php include 'footer.php'; ?> 