<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <span class="text-dark"><b>Program name</b> <span class="text-danger ml-2">*</span></span>
            <select class="form-control" name="classId" id="" required>
              <option value="" selected disabled>Select program</option>
              <?php 
                $prog = mysqli_query($conn, "SELECT * FROM tblclass ORDER BY className");
                if(mysqli_num_rows($prog) > 0) {
                  while($r = mysqli_fetch_array($prog)) {
              ?>
                <option value="<?php echo $r['Id']; ?>"><?php echo $r['className']; ?></option>
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
            <input type="text" class="form-control" name="classArmName" required>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="create_Program">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>