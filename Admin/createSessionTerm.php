<?php include 'navbar.php'; ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">School Year and Semester</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">School Year and Semester</li>
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
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $fetch = mysqli_query($conn, "SELECT *, tblsessionterm.Id AS tblsessionterm_Id, tblsessionterm.dateCreated AS tblsessionterm_date, tblterm.termName FROM tblsessionterm JOIN tblterm ON tblsessionterm.termId=tblterm.Id");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['sessionName']; ?></td>
                    <td><?php echo $row['termName']; ?></td>
                    <td>
                      <?php 
                        if ($row['isActive'] == 1) {
                          echo $status = "Active";
                        } else { 
                          echo $status = "Inactive";
                        } 
                      ?>
                    </td>
                    <td><?php echo date("F d, Y", strtotime($row['tblsessionterm_date'])); ?></td>
                    <td>
                      <?php if($row['isActive'] == 1) { ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update<?php echo $row['tblsessionterm_Id']; ?>" disabled>Activate </button>
                      <?php } else { ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#activate<?php echo $row['tblsessionterm_Id']; ?>">Activate </button>
                      <?php } ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#update<?php echo $row['tblsessionterm_Id']; ?>">Update </button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['tblsessionterm_Id']; ?>">Delete</button>
                    </td>
                  </tr>
                  <?php include 'createSessionTerm_update_delete.php'; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

<?php include 'createSessionTerm_add.php'; ?>   
<?php include 'footer.php'; ?> 