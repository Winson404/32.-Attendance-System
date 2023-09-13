<?php 
    include '../dbcon.php';
    
    // UPDATE CLASS
    if(isset($_POST['update_class'])) {

        $Id = $_POST['Id'];
        $classname = $_POST['classname'];
        
        $query=mysqli_query($conn,"UPDATE tblclass SET className='$classname' WHERE Id='$Id' ");
        if ($query) {
            $_SESSION['message']  = "Record has been updated successfully";
            $_SESSION['text'] = "Updated";
            $_SESSION['status'] = "success";
            header("Location: createClass.php");
        } else {
            $_SESSION['message']  = "Error while updating the record";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClass.php");
        }
    }



    // UPDATE COURSE 
    if(isset($_POST['update_course'])) {
        $Id            = $_POST['Id'];
        $classId       = $_POST['classId'];
        $classArmName  = $_POST['classArmName'];

        $query=mysqli_query($conn,"SELECT * FROM tblclassarms WHERE classArmName ='$classArmName' AND classId='$classId' AND Id != '$Id' ");
        if(mysqli_num_rows($query) > 0) { 
            $_SESSION['message']  = "Course name already exists";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassArms.php");
        } else {

            $query=mysqli_query($conn,"UPDATE tblclassarms SET classId='$classId', classArmName='$classArmName' WHERE Id='$Id' ");
            if ($query) {
                $_SESSION['message']  = "Record has been updated successfully";
                $_SESSION['text'] = "Updated";
                $_SESSION['status'] = "success";
                header("Location: createClassArms.php");
            } else {
                $_SESSION['message']  = "Error while updating the record";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createClassArms.php");
            }
      }
    }





    // UPDATE TEACHER
    if(isset($_POST['update_teacher'])) {
        $Id             = $_POST['Id'];
        $firstName      = $_POST['firstName'];
        $lastName       = $_POST['lastName'];
        $emailAddress   = $_POST['emailAddress'];
        $phoneNo        = $_POST['phoneNo'];

        $query=mysqli_query($conn,"SELECT * FROM tblteacher WHERE firstName ='$firstName' AND lastName='$lastName' AND Id !='$Id' ");
        if(mysqli_num_rows($query) > 0) { 
            $_SESSION['message']  = "Instructor name already exists";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createTeacher.php");
        } else {
            $query=mysqli_query($conn,"SELECT * FROM tblteacher WHERE emailAddress ='$emailAddress' AND Id !='$Id' ");
            if(mysqli_num_rows($query) > 0) { 
                $_SESSION['message']  = "Email already exists";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createTeacher.php");
            } else {
                $query=mysqli_query($conn, "UPDATE tblteacher SET firstName='$firstName', lastName='$lastName', emailAddress='$emailAddress', phoneNo='$phoneNo' WHERE Id='$Id' ");
                if ($query) {
                    $_SESSION['message']  = "Record has been updated";
                    $_SESSION['text'] = "Updated";
                    $_SESSION['status'] = "success";
                    header("Location: createTeacher.php");
                } else {
                    $_SESSION['message']  = "Error while updating the record";
                    $_SESSION['text'] = "Please try again.";
                    $_SESSION['status'] = "error";
                    header("Location: createTeacher.php");
                }
            }
      }
    }
    









    // UPDATE INSTRUCTOR
    if(isset($_POST['update_students'])) {
        $Id              = $_POST['Id'];
        $firstName       = $_POST['firstName'];
        $otherName       = $_POST['otherName'];
        $lastName        = $_POST['lastName'];
        $admissionNumber = $_POST['admissionNumber'];
        $classId         = $_POST['classId'];
        $classArmId      = $_POST['classArmId'];
       
        $query=mysqli_query($conn,"SELECT * FROM tblstudents WHERE firstName='$firstName' AND lastName='$lastName' AND otherName='$otherName' AND Id != '$Id' ");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['message']  = "Student name already exist";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createStudents_update.php?tblstudents_Id=".$Id);
        } else {
            $query=mysqli_query($conn,"SELECT * FROM tblstudents WHERE admissionNumber='$admissionNumber' AND AND Id != '$Id'");
            if(mysqli_num_rows($query) > 0) {
                $_SESSION['message']  = "Student ID already exist";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createStudents_update.php?tblstudents_Id=".$Id);
            } else {
                $query4=mysqli_query($conn, "UPDATE tblstudents SET firstName='$firstName', lastName='$lastName', otherName='$otherName', admissionNumber='$admissionNumber', classId='$classId', classArmId='$classArmId' WHERE Id = '$Id' ");
                if ($query4) {
                        $_SESSION['message']  = "Record has been updated";
                        $_SESSION['text'] = "Updated";
                        $_SESSION['status'] = "success";
                        header("Location: createStudents_update.php?tblstudents_Id=".$Id);
                } else  {
                     $_SESSION['message']  = "Error while saving the record";
                     $_SESSION['text'] = "Please try again.";
                     $_SESSION['status'] = "error";
                     header("Location: createStudents_update.php?tblstudents_Id=".$Id);
                }
            }
        }
    }





    // UPDATE STUDENT
    if(isset($_POST['update_instructor'])) {
        $Id           = $_POST['Id'];
        $teacherId    = $_POST['teacherId'];
        $classId      = $_POST['classId'];
        $classArmId   = $_POST['classArmId'];

        $fetch = mysqli_query($conn, "SELECT * FROM tblclassteacher WHERE Id='$Id'");
        $row = mysqli_fetch_array($fetch);
        $exist_classArmId = $row['classArmId'];
        $exist_classId = $row['classId'];
       
        $query=mysqli_query($conn,"SELECT * FROM tblclassteacher WHERE teacherId='$teacherId' AND classId='$classId' AND classArmId='$classArmId' AND Id != '$Id' ");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['message']  = "This course is already assigned to the selected teacher";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassTeacher_update.php?tblclassteacher_Id=".$Id);
        } else {
            
            $query4=mysqli_query($conn, "UPDATE tblclassteacher SET teacherId='$teacherId', classId='$classId', classArmId='$classArmId' WHERE Id='$Id' ");
            if ($query4) {
                $query5 = mysqli_query($conn, "UPDATE tblclassarms SET isAssigned=0 WHERE Id='$exist_classArmId' ");
                if ($query5) {
                    $query6 = mysqli_query($conn, "UPDATE tblclassarms SET isAssigned=1 WHERE Id='$classArmId' ");
                    if ($query6) {
                        $_SESSION['message']  = "Record has been updated";
                        $_SESSION['text'] = "Saved.";
                        $_SESSION['status'] = "success";
                        header("Location: createClassTeacher_update.php?tblclassteacher_Id=".$Id);
                    }  else {
                        $_SESSION['message']  = "Error while updating the record";
                        $_SESSION['text'] = "Please try again.";
                        $_SESSION['status'] = "error";
                        header("Location: createClassTeacher_update.php?tblclassteacher_Id=".$Id);
                    }   
                 }  else {
                    $_SESSION['message']  = "Error while updating the record Class Arms";
                    $_SESSION['text'] = "Please try again.";
                    $_SESSION['status'] = "error";
                    header("Location: createClassTeacher_update.php?tblclassteacher_Id=".$Id);
                }
            } else  {
                 $_SESSION['message']  = "Error while saving the record";
                 $_SESSION['text'] = "Please try again.";
                 $_SESSION['status'] = "error";
                 header("Location: createClassTeacher_update.php?tblclassteacher_Id=".$Id);
            }

        }
    }





    // UPDATE SCHOOL YEAR
    if(isset($_POST['update_schoolYear'])) {

        $Id           = $_POST['Id'];
        $sessionName  = $_POST['sessionName'];
        $termId       = $_POST['termId'];
       
        $query=mysqli_query($conn,"SELECT * FROM tblsessionterm WHERE sessionName='$sessionName' AND termId='$termId' AND Id != '$Id' ");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['message']  = "School Year already exist";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createSessionTerm.php");
        } else {
            $query4=mysqli_query($conn, "UPDATE tblsessionterm SET sessionName='$sessionName', termId='$termId', isActive=0 WHERE Id='$Id' ");
            if ($query4) {
                    $_SESSION['message']  = "Record has been updated";
                    $_SESSION['text'] = "Updated";
                    $_SESSION['status'] = "success";
                    header("Location: createSessionTerm.php");
            } else  {
                 $_SESSION['message']  = "Error while saving the record";
                 $_SESSION['text'] = "Please try again.";
                 $_SESSION['status'] = "error";
                 header("Location: createSessionTerm.php");
            }
        }
    }




   // ACTIVATE SCHOOL YEAR
    if(isset($_POST['activate_schoolYear'])) {
        $Id = $_POST['Id'];
        $update = mysqli_query($conn, "UPDATE tblsessionterm SET isActive=0 WHERE isActive=1 ");
        if($update) {
            $update = mysqli_query($conn, "UPDATE tblsessionterm SET isActive=1 WHERE Id='$Id' ");
            if($update) {
                $_SESSION['message'] = "Record has been updated";
                $_SESSION['text'] = "Updated";
                $_SESSION['status'] = "success";
                header("Location: createSessionTerm.php");
            } else {
                $_SESSION['message'] = "Something went wrong while updating the record";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createSessionTerm.php");
           }
        } else {
            $_SESSION['message'] = "Something went wrong while updating isActive column to 0";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createSessionTerm.php");
       }
    }
    


?>
