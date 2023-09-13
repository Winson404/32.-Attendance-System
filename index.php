<?php 
    include 'dbcon.php';
    if(isset($_SESSION['userId'])) {
      header('Location: Admin/index.php');
    } elseif(isset($_SESSION['teacherId'])) {
      header('Location: Instructor/index.php');
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/new0.jpg" rel="icon">
  <title>Student Attendance System - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-gradient-login" style="background-image: url('img/logo/loral1.jpe00g');">
<!-- Login Content -->
<div class="container-login">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <h5 align="center" style="font-family: Lucida Handwriting, Cursive; font-weight: bold; color: #333;">STUDENT ATTENDANCE SYSTEM</h5>
                <div class="text-center">
                  <img src="img/logo/new0.jpg" style="width:100px;height:100px">
                  <br><br>
                  <h1 class="h4 text-gray-900 mb-4" style="font-family: Lucida Handwriting, Cursive; font-weight: bold; color: #333;"
                >Admin Login Panel</h1>
                </div>
                  <form action="processes.php" class="user" method="post">
                    <div class="form-group">
                      <select required name="userType" class="form-control mb-3" onchange="changePlaceholder(this.value)">
                        <option value="">--User Types--</option>
                        <option value="Administrator">Admin</option>
                        <option value="ClassTeacher">Instructor</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" required name="username" id="exampleInputEmail" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" required class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>
                   <div class="form-group">
                      <input type="submit" class="btn btn-success btn-block" value="Login" name="login" />
                    </div>
                  </form>
                <div class="text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

  <script>
    function changePlaceholder(userType) {
      const usernameInput = document.getElementById('exampleInputEmail');

      if (userType === 'Administrator') {
        usernameInput.placeholder = 'Enter Admin Email Address';
      } else if (userType === 'ClassTeacher') {
        usernameInput.placeholder = 'Enter Instructor Course Code';
      } else {
        usernameInput.placeholder = 'Enter Course Code';
      }
    }
  </script>


</body>
</html>


<?php include 'sweetalert_messages.php'; }  ?>