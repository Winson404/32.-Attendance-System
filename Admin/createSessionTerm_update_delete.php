<!-- UPDATE MODAL -->
<div class="modal fade" id="update<?php echo $row['tblsessionterm_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create school year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['tblsessionterm_Id']; ?>" name="Id">
          <div class="form-group">
            <label class="form-control-label">School Year<span class="text-danger ml-2">*</span></label>
            <input type="text" class="form-control" name="sessionName" value="<?php echo htmlspecialchars ($row['sessionName']);?>" id="exampleInputFirstName" placeholder="School Year" required>
          </div>
          <div class="form-group">
            <label class="form-control-label">Semester<span class="text-danger ml-2">*</span></label>
            <?php
              $qry= "SELECT * FROM tblterm ORDER BY termName ASC";
              $result = $conn->query($qry);
              $num = $result->num_rows;   
              if ($num > 0){
                  echo ' <select required name="termId" class="form-control mb-3">';
                  echo'<option value="">--Select Semester--</option>';
                while ($rows = $result->fetch_assoc()){
                  echo'<option value="'.$rows['Id'].'" >'.$rows['termName'].'</option>';
                } 
                  echo '</select>';
              }
            ?>  
          </div>
         
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="update_schoolYear">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- DELETE MDOAL -->
<div class="modal fade" id="delete<?php echo $row['tblsessionterm_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Delete school year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['tblsessionterm_Id']; ?>" name="Id">
          <h6 class="text-center">Are you sure you want to delete this record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="delete_schoolYear">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- ACTIVATE MDOAL -->
<div class="modal fade" id="activate<?php echo $row['tblsessionterm_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Activate school year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['tblsessionterm_Id']; ?>" name="Id">
          <h6 class="text-center">Are you sure you want to activate this record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="activate_schoolYear">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

