<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">First name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="firstName" pattern="^[A-Za-z]+( [A-Za-z]+)*$">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Last name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="lastName" pattern="^[A-Za-z]+( [A-Za-z]+)*$">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Email<span class="text-danger ml-2">*</span></label>
                <input type="email" class="form-control" required name="emailAddress" pattern="^(?=.*\S).+$">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Phone No.<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" name="phoneNo" required pattern="^[0-9+]+$">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="create_teacher">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
