<?php 
    include '../dbcon.php';

    // DELETE CLASS
    if(isset($_POST['delete_class'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblclass WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createClass.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClass.php");
          }
    }



    // DELETE COURSE
    if(isset($_POST['delete_course'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblclassarms WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createClassArms.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassArms.php");
          }
    }




    // DELETE TEACHER
    if(isset($_POST['delete_teacher'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblteacher WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createTeacher.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createTeacher.php");
          }
    }




    // DELETE INSTRUCTOR'S COURSE
    if(isset($_POST['delete_classTeacher'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblclassteacher WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createClassTeacher.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassTeacher.php");
          }
    }




    // DELETE STUDENT
    if(isset($_POST['delete_student'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblstudents WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createStudents.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createStudents.php");
          }
    }



    // DELETE SCHOOL YEAR
    if(isset($_POST['delete_schoolYear'])) {
        $Id = $_POST['Id'];
        $delete = mysqli_query($conn, "DELETE FROM tblsessionterm WHERE Id='$Id'");
        if($delete) {
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['text'] = "Deleted successfully!";
            $_SESSION['status'] = "success";
            header("Location: createSessionTerm.php");
          } else {
            $_SESSION['message'] = "Something went wrong while deleting the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createSessionTerm.php");
          }
    }



    


    

?>