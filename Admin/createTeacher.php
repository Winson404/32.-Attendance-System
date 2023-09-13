<?php include 'navbar.php'; ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teacher records</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Teacher records</li>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Date Created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $fetch = mysqli_query($conn, "SELECT * FROM tblteacher");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['emailAddress']; ?></td>
                    <td><?php echo $row['phoneNo']; ?></td>
                    <td><?php echo date("F d, Y", strtotime($row['dateCreated'])); ?></td>
                    <td>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#update<?php echo $row['Id']; ?>">Update </button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['Id']; ?>">Delete</button>
                    </td>
                  </tr>
                  <?php include 'createTeacher_update_delete.php'; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

<?php include 'createTeacher_add.php'; ?>   
<?php include 'footer.php'; ?> 