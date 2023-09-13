
<?php 
    error_reporting(0);
    include '../dbcon.php';

    if(isset($_SESSION['teacherId'])) {
    $Id = $_SESSION['teacherId'];

    $query = mysqli_query($conn, "SELECT * FROM tblteacher JOIN tblclassteacher ON tblteacher.Id=tblclassteacher.teacherId WHERE tblteacher.Id = '$Id' ");
    $rows = mysqli_fetch_array($query);
    $fullName = $rows['firstName']." ".$rows['lastName'];
    $log_classId = $rows['classId'];
    $log_classArmId = $rows['classArmId'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/new0.jpg" rel="icon">
  <title>Attendance System - Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center bg-gradient-primary justify-content-center" href="index.php">
        <div class="sidebar-brand-icon" >
          <img src="../img/logo/new0.jpg">
        </div>
        <div class="sidebar-brand-text mx-3">Attendance System</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Students
      </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap2">
          <i class="fas fa-user-graduate"></i>
          <span>Manage Students</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View Students</h6>
            <?php 
              $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id WHERE tblclassteacher.teacherId='$Id' ");
              if(mysqli_num_rows($get) > 0) {
                while ($r_get = mysqli_fetch_array($get)) {
            ?>
              <a class="collapse-item" href="viewStudents.php?tblclassteacher_Id=<?php echo $r_get['tblclassteacher_Id']; ?>"><?php echo $r_get['className'].' - '.$r_get['classArmName']; ?></a>
            <?php
                }
              } else { ?>
                <a class="collapse-item" href="#">No program/courses assigned</a>
            <?php } ?>
            
            <!-- <a class="collapse-item" href="#">Assets Type</a> -->
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        TAKE ATTENDANCE
      </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
          aria-expanded="true" aria-controls="collapseBootstrap3">
          <i class="fas fa-user-graduate"></i>
          <span>Take Attendance</span>
        </a>
        <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Take Attendance</h6>
            <?php 
              $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id  WHERE tblclassteacher.teacherId='$Id'");
              if(mysqli_num_rows($get) > 0) {
                while ($r_get = mysqli_fetch_array($get)) {
            ?>
              <a class="collapse-item" href="takeAttendance.php?tblclassteacher_Id=<?php echo $r_get['tblclassteacher_Id']; ?>"><?php echo $r_get['className'].' - '.$r_get['classArmName']; ?></a>
            <?php
                }
              } else { ?>
                <a class="collapse-item" href="#">No program/courses assigned</a>
            <?php } ?>
            
            <!-- <a class="collapse-item" href="#">Assets Type</a> -->
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        VIEW ATTENDANCE
      </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
          aria-expanded="true" aria-controls="collapseBootstrap4">
          <i class="fas fa-user-graduate"></i>
          <span>View Attendance</span>
        </a>
        <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View Attendance</h6>
            <?php 
              $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id WHERE tblclassteacher.teacherId='$Id'");
              if(mysqli_num_rows($get) > 0) {
                while ($r_get = mysqli_fetch_array($get)) {
            ?>
              <a class="collapse-item" href="viewAttendance.php?tblclassteacher_Id=<?php echo $r_get['tblclassteacher_Id']; ?>"><?php echo $r_get['className'].' - '.$r_get['classArmName']; ?></a>
            <?php
                }
              } else { ?>
                <a class="collapse-item" href="#">No program/courses assigned</a>
            <?php } ?>
            
            <!-- <a class="collapse-item" href="#">Assets Type</a> -->
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">


      <div class="sidebar-heading">
        ATTENDANCE REPORT
      </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
          aria-expanded="true" aria-controls="collapseBootstrap5">
          <i class="fas fa-user-graduate"></i>
          <span>Attendance report</span>
        </a>
        <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Attendance report</h6>
            <?php 
              $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id WHERE tblclassteacher.teacherId='$Id'");
              if(mysqli_num_rows($get) > 0) {
                while ($r_get = mysqli_fetch_array($get)) {
            ?>
              <a class="collapse-item" href="reportAttendance.php?tblclassteacher_Id=<?php echo $r_get['tblclassteacher_Id']; ?>"><?php echo $r_get['className'].' - '.$r_get['classArmName']; ?></a>
            <?php
                }
              } else { ?>
                <a class="collapse-item" href="#">No program/courses assigned</a>
            <?php } ?>
            
            <!-- <a class="collapse-item" href="#">Assets Type</a> -->
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">


      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->

        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top">
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <div class="text-white big" style="margin-left:100px;"></div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <!--<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>-->
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
         
           
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../img/user-icn.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><b>Welcome <?php echo $fullName; ?></b></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

<?php include 'sweetalert_messages.php'; } else { header('Location: ../logout.php'); } ?>