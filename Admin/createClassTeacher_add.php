<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Create instructor's course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-control-label">Select teacher<span class="text-danger ml-2">*</span></label>
                <select class="form-control" name="teacherId" id="" required>
                  <option value="" selected disabled>Select teacher</option>
                  <?php 
                    $prog = mysqli_query($conn, "SELECT * FROM tblteacher ORDER BY lastName");
                    if(mysqli_num_rows($prog) > 0) {
                      while($r = mysqli_fetch_array($prog)) {
                  ?>
                    <option value="<?php echo $r['Id']; ?>"><?php echo $r['firstName'].' '.$r['lastName']; ?></option>
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
            <div class="form-group">
            <label class="form-control-label">Select Course<span class="text-danger ml-2">*</span></label>
                <?php
                    echo"<div id='txtHint'></div>";
                ?>
            </div>
          </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary text-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-primary text-light" name="create_instructor">Submit</button>
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
        xmlhttp.open("GET","ajaxClassArms.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>