<!-- UPDATE MODAL -->
<div class="modal fade" id="update<?php echo $row['tblclassarms_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Update course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['tblclassarms_Id']; ?>" name="Id">
          <div class="form-group">
            <span class="text-dark"><b>Program name</b> <span class="text-danger ml-2">*</span></span>
            <select class="form-control" name="classId" id="" required>
              <option value="" selected disabled>Select program</option>
              <?php 
                $class_ID = $row['classId'];
                $prog = mysqli_query($conn, "SELECT * FROM tblclass ORDER BY className");
                if(mysqli_num_rows($prog) > 0) {
                  while($r = mysqli_fetch_array($prog)) {
              ?>
                <option value="<?php echo $r['Id']; ?>" <?php if($r['Id'] == $class_ID) { echo 'selected'; } ?>><?php echo $r['className']; ?></option>
              <?php
                  }

                } else {
              ?>
                <option value="" selected disabled>No record found</option>
              <?php    
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <span class="text-dark"><b>Course name</b> <span class="text-danger ml-2">*</span></span>
            <input type="text" class="form-control" name="classArmName" required value="<?php echo $row['classArmName']; ?>">
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="update_course">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- DELETE MDOAL -->
<div class="modal fade" id="delete<?php echo $row['tblclassarms_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Delete course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['tblclassarms_Id']; ?>" name="Id">
          <h6 class="text-center">Are you sure you want to delete this record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="delete_course">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>