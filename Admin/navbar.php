<?php 
    error_reporting(0);
    include '../dbcon.php';

    if(isset($_SESSION['userId'])) {

    $query = "SELECT * FROM tbladmin WHERE Id = ".$_SESSION['userId']."";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();
    $fullName = $rows['firstName']." ".$rows['lastName'];

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
  <title>Attendance Admin - Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
  <style>
    .form-control {
      text-transform: capitalize;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      
       <ul class="navbar-nav sidebar sidebar-light accordion " id="accordionSidebar">
          <a class="sidebar-brand d-flex align-items-center bg-gradient-primary  justify-content-center" href="index.php">
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
            Programs and Courses
          </div>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
              aria-expanded="true" aria-controls="collapseBootstrap">
              <i class="fas fa-chalkboard"></i>
              <span>Manage Program</span>
            </a>
            <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Program</h6>
                <a class="collapse-item" href="createClass.php">Create Program</a>
                <!-- <a class="collapse-item" href="#">Member List</a> -->
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapusers"
              aria-expanded="true" aria-controls="collapseBootstrapusers">
              <i class="fas fa-code-branch"></i>
              <span>Manage Courses</span>
            </a>
            <div id="collapseBootstrapusers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Courses</h6>
                <a class="collapse-item" href="createClassArms.php">Manage Courses</a>
                <!-- <a class="collapse-item" href="usersList.php">User List</a> -->
              </div>
            </div>
          </li>
           <hr class="sidebar-divider">
          <div class="sidebar-heading">
            Instructors
          </div>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapassests"
              aria-expanded="true" aria-controls="collapseBootstrapassests">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Manage Instructors</span>
            </a>
            <div id="collapseBootstrapassests" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Course Instructors</h6>
                 <a class="collapse-item" href="createTeacher.php">Manage Instructor records</a>
                 <a class="collapse-item" href="createClassTeacher.php">Instructors' courses</a>
                 <!-- <a class="collapse-item" href="createAssets.php">Create Assets</a> -->
              </div>
            </div>
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
                <h6 class="collapse-header">Manage Students</h6>
                <a class="collapse-item" href="createStudents.php">Create Students</a>
                <!-- <a class="collapse-item" href="#">Assets Type</a> -->
              </div>
            </div>
          </li>

          <hr class="sidebar-divider">
          <div class="sidebar-heading">
           School Year & Semester
          </div>
          </li>
           <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon"
              aria-expanded="true" aria-controls="collapseBootstrapcon">
              <i class="fa fa-calendar-alt"></i>
              <span>Manage School Year & Semester</span>
            </a>
            <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Create S.Y & Sem.</h6>
                <a class="collapse-item" href="createSessionTerm.php">Create School Year &</br>Semester</a>
                <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
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
        <div class="text-white big" style="margin-left:100px;"><b></b></div>
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
                <span class="ml-2 d-none d-lg-inline text-white small"><b>Welcome <?php echo $fullName;?></b></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

<?php include 'sweetalert_messages.php'; } else { header('Location: ../logout.php'); } ?>
  