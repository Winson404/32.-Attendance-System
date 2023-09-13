<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="form-control-label">First name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="firstName" pattern="^[A-Za-z]+( [A-Za-z]+)*$">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="form-control-label">Middle name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="otherName" pattern="^[A-Za-z]+( [A-Za-z]+)*$">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="form-control-label">Last name<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="lastName" pattern="^[A-Za-z]+( [A-Za-z]+)*$">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Student ID<span class="text-danger ml-2">*</span></label>
                <input type="text" class="form-control" required name="admissionNumber">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-control-label">Select Program<span class="text-danger ml-2">*</span></label>
                 <?php
                  $qry= "SELECT * FROM tblclass ORDER BY className ASC";
                  $result = $conn->query($qry);
                  $num = $result->num_rows;   
                  if ($num > 0) {
                    echo ' <select required name="classId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
                    echo'<option value="">--Select Program--</option>';
                    while ($rows = $result->fetch_assoc()){
                    echo'<option value="'.$rows['Id'].'" >'.$rows['className'].'</option>';
                      }
                    echo '</select>';
                  }
                ?>  
              </div>
              
            </div>
            <div class="col-6">
              <div class="form-group">
              <label class="form-control-label">Select Course<span class="text-danger ml-2">*</span></label>
                  <?php
                      echo"<div id='txtHint'></div>";
                  ?>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="create_student">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




 <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>