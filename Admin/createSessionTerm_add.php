<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create school year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="form-control-label">School Year<span class="text-danger ml-2">*</span></label>
            <input type="text" class="form-control" name="sessionName" id="exampleInputFirstName" placeholder="School Year" required>
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
        <button type="submit" class="btn bg-primary text-light" name="create_schoolYear">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>