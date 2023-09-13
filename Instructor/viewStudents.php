<?php 
    include "navbar.php"; 

    if(isset($_GET['tblclassteacher_Id'])) {
      $id = $_GET['tblclassteacher_Id'];
    
    $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id JOIN tblteacher ON tblclassteacher.teacherId=tblteacher.Id WHERE tblclassteacher.Id='$id'");
    $row = mysqli_fetch_array($get);
    
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Student in (<?php echo $row['className'].' - '.$row['classArmName'];?>) Class</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Student in Class</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">

      <!-- Input Group -->
     <div class="row">
      <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light ">
              <tr>
                <th>#</th>
                <th>Student name</th>
                <th>Student ID</th>
                <!-- <th>Program</th>
                <th>Course</th> -->
                <th>Date created</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
                    $i = 1;
                    $status="";
                    $fetch = mysqli_query($conn, "SELECT *, tblstudents.Id AS tblstudents_Id, tblstudents.dateCreated AS tblstudents_date FROM tblstudents, tblclassteacher JOIN tblclass ON tblclassteacher.classId=tblclass.Id JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id WHERE tblclassteacher.classId=tblstudents.classId AND tblclassteacher.classArmId=tblstudents.classArmId AND tblclassteacher.Id='$id' ");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['firstName'].' '.$row['otherName'].' '.$row['lastName']; ?></td>
                    <td><?php echo $row['admissionNumber']; ?></td>
                    <!-- <td><?php echo $row['className']; ?></td>
                    <td><?php echo $row['classArmName']; ?></td> -->
                    <td><?php echo date("F d, Y", strtotime($row['tblstudents_date'])); ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>

  </div>
</div>
</div>
<!-- Footer -->
<?php include "footer.php";?>
    

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