<!-- UPDATE MODAL -->
<div class="modal fade" id="update<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" required name="Id" value="<?php echo $row['Id']; ?>">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">First name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="firstName" pattern="^[A-Za-z]+( [A-Za-z]+)*$" value="<?php echo $row['firstName']; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Last name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="lastName" pattern="^[A-Za-z]+( [A-Za-z]+)*$" value="<?php echo $row['lastName']; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Email<span class="text-danger ml-2">*</span></label>
                <input type="email" class="form-control" required name="emailAddress" pattern="^(?=.*\S).+$" value="<?php echo $row['emailAddress']; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Phone No.<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" name="phoneNo" required pattern="^[0-9+]+$" value="<?php echo $row['phoneNo']; ?>">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="update_teacher">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- DELETE MDOAL -->
<div class="modal fade" id="delete<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Delete teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="Id">
          <h6 class="text-center">Are you sure you want to delete this record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="delete_teacher">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
