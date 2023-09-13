
<?php
  include 'dbcon.php';

  if(isset($_POST['login'])) {

    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if($userType == "Administrator") {
      $query = mysqli_query($conn, "SELECT * FROM tbladmin WHERE emailAddress = '$username' AND password = '$password'");
      if(mysqli_num_rows($query) > 0) { 
        $rows = mysqli_fetch_array($query);
        $_SESSION['userId'] = $rows['Id'];
        header('Location: Admin/index.php');
      }
      else{
        $_SESSION['message']  = "Invalid Username/Password!";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: index.php");
      }
    } else {
      $query = mysqli_query($conn, "SELECT * FROM tblteacher WHERE emailAddress='$username' AND password='$password'");
      if(mysqli_num_rows($query) > 0) { 
        $rows = mysqli_fetch_array($query);
        $_SESSION['teacherId'] = $rows['Id'];
        header('Location: Instructor/index.php');
      } else {
        $_SESSION['message']  = "Invalid Username/Password!";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: index.php");
      }
    }
 }
?>