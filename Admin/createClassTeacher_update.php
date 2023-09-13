<?php 
    include 'navbar.php'; 
    if(isset($_GET['tblclassteacher_Id'])) {
      $tblclassteacher_Id = $_GET['tblclassteacher_Id'];

      $fetch = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblteacher.Id AS tblteacher_Id, tblclassarms.Id AS classArms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblteacher ON tblclassteacher.teacherId=tblteacher.Id JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id WHERE tblclassteacher.Id='$tblclassteacher_Id'");
      $row = mysqli_fetch_array($fetch);
?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Instructors' courses</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Instructors' courses</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-5 p-4">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" value="<?php echo $tblclassteacher_Id; ?>" name="Id">
            <div class="form-group">
                <label class="form-control-label">Select teacher<span class="text-danger ml-2">*</span></label>
                <select class="form-control" name="teacherId" id="" required>
                  <option value="" selected disabled>Select teacher</option>
                  <?php 
                    $teacherId = $row['tblteacher_Id'];
                    $prog = mysqli_query($conn, "SELECT * FROM tblteacher ORDER BY lastName");
                    if(mysqli_num_rows($prog) > 0) {
                      while($r = mysqli_fetch_array($prog)) {
                  ?>
                    <option value="<?php echo $r['Id']; ?>" <?php if($r['Id'] == $teacherId) { echo 'selected'; } ?>><?php echo $r['firstName'].' '.$r['lastName']; ?></option>
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
            <div class="card-footer">
              <a type="button" href="createClassTeacher.php" class="btn bg-secondary text-light" data-dismiss="modal">Back</a>
              <button type="submit" class="btn bg-primary text-light" name="update_instructor">Submit</button>
            </div> 
          </div>
        </div>
      </div>
    </div>

<?php include 'footer.php'; ?> 

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

<?php } ?>