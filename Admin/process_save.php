<?php 
    include '../dbcon.php';

    // SAVE CLASS
    if(isset($_POST['create_class'])) {
        
        $classname=$_POST['classname'];
       
        $query=mysqli_query($conn,"SELECT * FROM tblclass WHERE className ='$classname'");
        if(mysqli_num_rows($query) > 0) { 
            $_SESSION['message']  = "Class name already exists";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClass.php");
        } else {

            $query=mysqli_query($conn,"INSERT INTO tblclass (className) VALUES ('$classname') ");
            if ($query) {
                $_SESSION['message']  = "Record has been saved";
                $_SESSION['text'] = "Saved.";
                $_SESSION['status'] = "success";
                header("Location: createClass.php");
            } else {
                $_SESSION['message']  = "Error while saving the record";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createClass.php");
            }
      }
    }



    // SAVE PROGRAM
    if(isset($_POST['create_Program'])) {
        
        $classId       = $_POST['classId'];
        $classArmName  = $_POST['classArmName'];

        $query=mysqli_query($conn,"SELECT * FROM tblclassarms WHERE classArmName ='$classArmName' AND classId='$classId' ");
        if(mysqli_num_rows($query) > 0) { 
            $_SESSION['message']  = "Course name already exists";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassArms.php");
        } else {

            $query=mysqli_query($conn,"INSERT INTO tblclassarms (classId, classArmName) VALUES ('$classId', '$classArmName') ");
            if ($query) {
                $_SESSION['message']  = "Record has been saved";
                $_SESSION['text'] = "Saved.";
                $_SESSION['status'] = "success";
                header("Location: createClassArms.php");
            } else {
                $_SESSION['message']  = "Error while saving the record";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createClassArms.php");
            }
      }
    }



    // SAVE TEACHER
    if(isset($_POST['create_teacher'])) {
        
        $firstName      = $_POST['firstName'];
        $lastName       = $_POST['lastName'];
        $emailAddress   = $_POST['emailAddress'];
        $phoneNo        = $_POST['phoneNo'];

        $sampPass     = "pass123";
        $sampPass_2   = md5($sampPass);

        $dateCreated  = date("Y-m-d");

        $query=mysqli_query($conn,"SELECT * FROM tblteacher WHERE firstName ='$firstName' AND lastName='$lastName' ");
        if(mysqli_num_rows($query) > 0) { 
            $_SESSION['message']  = "Instructor name already exists";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createTeacher.php");
        } else {
            $query=mysqli_query($conn,"SELECT * FROM tblteacher WHERE emailAddress ='$emailAddress' ");
            if(mysqli_num_rows($query) > 0) { 
                $_SESSION['message']  = "Email already exists";
                $_SESSION['text'] = "Please try again.";
                $_SESSION['status'] = "error";
                header("Location: createTeacher.php");
            } else {
                $query=mysqli_query($conn, "INSERT INTO tblteacher (firstName, lastName, emailAddress, password, phoneNo, dateCreated) VALUES ('$firstName', '$lastName', '$emailAddress', '$sampPass_2', '$phoneNo', '$dateCreated') ");
                if ($query) {
                    $_SESSION['message']  = "Record has been saved";
                    $_SESSION['text'] = "Saved.";
                    $_SESSION['status'] = "success";
                    header("Location: createTeacher.php");
                } else {
                    $_SESSION['message']  = "Error while saving the record";
                    $_SESSION['text'] = "Please try again.";
                    $_SESSION['status'] = "error";
                    header("Location: createTeacher.php");
                }
            }
      }
    }








    // SAVE INSTRUCTOR
    if(isset($_POST['create_instructor'])) {
    
        $teacherId    = $_POST['teacherId'];
        $classId      = $_POST['classId'];
        $classArmId   = $_POST['classArmId'];
        $dateCreated  = date("Y-m-d");
       
        $query=mysqli_query($conn,"SELECT * FROM tblclassteacher WHERE teacherId='$teacherId' AND classId='$classId' AND classArmId='$classArmId' ");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['message']  = "This course is already assigned to the selected teacher";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createClassTeacher.php");
        } else {

            $query4=mysqli_query($conn, "INSERT INTO tblclassteacher (teacherId, classId, classArmId, dateCreated) VALUES ('$teacherId', '$classId', '$classArmId', '$dateCreated') ");
            if ($query4) {
                $query5 = mysqli_query($conn, "UPDATE tblclassarms SET isAssigned=1 WHERE Id='$classArmId' ");
                if ($query5) {
                    $_SESSION['message']  = "Record has been saved";
                    $_SESSION['text'] = "Saved.";
                    $_SESSION['status'] = "success";
                    header("Location: createClassTeacher.php");
                }  else {
                    $_SESSION['message']  = "Error while updating the record";
                    $_SESSION['text'] = "Please try again.";
                    $_SESSION['status'] = "error";
                    header("Location: createClassTeacher.php");
                }

            } else  {
                 $_SESSION['message']  = "Error while saving the record";
                 $_SESSION['text'] = "Please try again.";
                 $_SESSION['status'] = "error";
                 header("Location: createClassTeacher.php");
            }

        }
    }
    



    // SAVE STUDENT
    if(isset($_POST['create_student'])) {

        $firstName        = ucwords($_POST['firstName']);
        $otherName        = ucwords($_POST['otherName']);
        $lastName         = ucwords($_POST['lastName']);
        $admissionNumber  = $_POST['admissionNumber'];
        $classId          = $_POST['classId'];
        $classArmId       = $_POST['classArmId'];
        $dateCreated  = date("Y-m-d");
       
        // $query=mysqli_query($conn,"SELECT * FROM tblstudents WHERE firstName='$firstName' AND lastName='$lastName' AND otherName='$otherName' ");
        // if(mysqli_num_rows($query) > 0) {
        //     $_SESSION['message']  = "Student name already exist";
        //     $_SESSION['text'] = "Please try again.";
        //     $_SESSION['status'] = "error";
        //     header("Location: createStudents.php");
        // } else {
        //     $query=mysqli_query($conn,"SELECT * FROM tblstudents WHERE admissionNumber='$admissionNumber'");
        //     if(mysqli_num_rows($query) > 0) {
        //         $_SESSION['message']  = "Student ID already exist";
        //         $_SESSION['text'] = "Please try again.";
        //         $_SESSION['status'] = "error";
        //         header("Location: createStudents.php");
        //     } else {
                $query4=mysqli_query($conn, "INSERT INTO tblstudents (firstName, lastName, otherName, admissionNumber, password, classId, classArmId, dateCreated) VALUES ('$firstName', '$lastName', '$otherName', '$admissionNumber', '12345', '$classId', '$classArmId', '$dateCreated' ) ");
                if ($query4) {
                        $_SESSION['message']  = "Record has been saved";
                        $_SESSION['text'] = "Saved.";
                        $_SESSION['status'] = "success";
                        header("Location: createStudents.php");
                } else  {
                     $_SESSION['message']  = "Error while saving the record";
                     $_SESSION['text'] = "Please try again.";
                     $_SESSION['status'] = "error";
                     header("Location: createStudents.php");
                }
        //     }
        // }
    }





    // SAVE SCHOOL YEAR
    if(isset($_POST['create_schoolYear'])) {

        $sessionName  = $_POST['sessionName'];
        $termId       = $_POST['termId'];
        $dateCreated  = date("Y-m-d");
       
        $query=mysqli_query($conn,"SELECT * FROM tblsessionterm WHERE sessionName='$sessionName' AND termId='$termId' ");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['message']  = "School Year already exist";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: createSessionTerm.php");
        } else {
            $query4=mysqli_query($conn, "INSERT INTO tblsessionterm (sessionName, termId, dateCreated) VALUES ('$sessionName', '$termId', '$dateCreated') ");
            if ($query4) {
                    $_SESSION['message']  = "Record has been saved";
                    $_SESSION['text'] = "Saved.";
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
    





?>

