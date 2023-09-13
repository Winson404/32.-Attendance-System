<?php 
    include 'navbar.php'; 
    if(isset($_GET['tblstudents_Id'])) {
      $tblstudents_Id = $_GET['tblstudents_Id'];

      $fetch = mysqli_query($conn, "SELECT *, tblstudents.Id AS tblstudents_Id, tblstudents.dateCreated AS tblstudents_dateCreated, tblclass.Id AS tblclass_Id, tblclassarms.Id AS tblclassarms_Id FROM tblstudents JOIN tblclass ON tblstudents.classId=tblclass.Id JOIN tblclassarms ON tblstudents.classArmId=tblclassarms.Id WHERE tblstudents.Id='$tblstudents_Id' ");
      $row = mysqli_fetch_array($fetch);
?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student records</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student records</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-5 p-4">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" value="<?php echo $tblstudents_Id; ?>" name="Id">
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="form-control-label">First name<span class="text-danger ml-2">*</span></label>
                    <input type="text" class="form-control" required name="firstName" pattern="^[A-Za-z]+( [A-Za-z]+)*$" value="<?php echo $row['firstName']; ?>">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="form-control-label">Middle name<span class="text-danger ml-2">*</span></label>
                    <input type="text" class="form-control" required name="otherName" pattern="^[A-Za-z]+( [A-Za-z]+)*$" value="<?php echo $row['otherName']; ?>">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="form-control-label">Last name<span class="text-danger ml-2">*</span></label>
                    <input type="text" class="form-control" required name="lastName" pattern="^[A-Za-z]+( [A-Za-z]+)*$" value="<?php echo $row['lastName']; ?>">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="form-control-label">Student ID<span class="text-danger ml-2">*</span></label>
                    <input type="text" class="form-control" required name="admissionNumber" value="<?php echo $row['admissionNumber']; ?>">
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
            <div class="card-footer">
              <a type="button" href="createStudents.php" class="btn bg-secondary text-light" data-dismiss="modal">Back</a>
              <button type="submit" class="btn bg-primary text-light" name="update_students">Submit</button>
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
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php } ?>