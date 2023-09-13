<?php 
    include '../dbcon.php';

    if (isset($_POST['save'])) {
    $Id = $_POST['Id'];
    $term_Id = $_POST['term_Id'];
    $teachId = $_POST['teachId'];
    $classId = $_POST['classId'];
    $classArmId = $_POST['classArmId'];

    // Process the form submission and save the checked rows
    if(isset($_POST['check'])) {
      $checkedRows = $_POST['check'];
      $currentDate = date('Y-m-d'); // Get the current date

      foreach($checkedRows as $admissionNumber) {
        // Check if records exist for the admission number and current date
        $existingRecordsQuery = "SELECT COUNT(*) AS count FROM tblattendance WHERE admissionNo = '$admissionNumber' AND dateTimeTaken = '$currentDate' AND (status=1 || status=0)";
        $existingRecordsResult = mysqli_query($conn, $existingRecordsQuery);
        $existingRecordsCount = mysqli_fetch_assoc($existingRecordsResult)['count'];

        if ($existingRecordsCount > 0) {
          // Display error message and redirect
          $_SESSION['message'] = "Some students have already took their attendance for today";
          $_SESSION['text'] = "Error.";
          $_SESSION['status'] = "error";
          header("Location: takeAttendance.php?tblclassteacher_Id=".$Id);
          exit; // Stop further execution
        }

        $dateTimeTaken = date('Y-m-d'); // Get the current date and time
        $status = 1;

        // Prepare and execute the INSERT query
        $insertQuery = "INSERT INTO tblattendance (admissionNo, sessionTermId , status, teacherId, classId, classArmId, dateTimeTaken) VALUES ('$admissionNumber', '$term_Id', '$status', '$teachId', '$classId', '$classArmId', '$dateTimeTaken')";
        mysqli_query($conn, $insertQuery);
      }
      
      // Display success message and redirect
      $_SESSION['message'] = "Marked present successfully";
      $_SESSION['text'] = "Present";
      $_SESSION['status'] = "success";
      header("Location: takeAttendance.php?tblclassteacher_Id=".$Id);
      exit; // Stop further execution
    }
  }







    if (isset($_POST['absent'])) {
    $Id = $_POST['Id'];
    $term_Id = $_POST['term_Id'];
    $teachId = $_POST['teachId'];
    $classId = $_POST['classId'];
    $classArmId = $_POST['classArmId'];


    // Process the form submission and save the checked rows
    if(isset($_POST['absentrow'])) {
      $checkedRows = $_POST['absentrow'];
      $currentDate = date('Y-m-d'); // Get the current date

      foreach($checkedRows as $admissionNumber) {
        // Check if records exist for the admission number and current date
        $existingRecordsQuery = "SELECT COUNT(*) AS count FROM tblattendance WHERE admissionNo = '$admissionNumber' AND DATE(dateTimeTaken) = '$currentDate' AND (status=1 || status=0)";
        $existingRecordsResult = mysqli_query($conn, $existingRecordsQuery);
        $existingRecordsCount = mysqli_fetch_assoc($existingRecordsResult)['count'];

        if ($existingRecordsCount > 0) {
          // Display error message and redirect
          $_SESSION['message'] = "Some students have already took their attendance for today";
          $_SESSION['text'] = "Error.";
          $_SESSION['status'] = "error";
          header("Location: takeAttendance.php?tblclassteacher_Id=".$Id);
          exit; // Stop further execution
        }

        $dateTimeTaken = date('Y-m-d'); // Get the current date and time
        $status = 0;

        // Prepare and execute the INSERT query
        $insertQuery = "INSERT INTO tblattendance (admissionNo, sessionTermId , status, teacherId, classId, classArmId, dateTimeTaken) VALUES ('$admissionNumber', '$term_Id', '$status', '$teachId', '$classId', '$classArmId', '$dateTimeTaken')";
        mysqli_query($conn, $insertQuery);
      }
      
      // Display success message and redirect
      $_SESSION['message'] = "Marked absent successfully";
      $_SESSION['text'] = "Absent";
      $_SESSION['status'] = "success";
      header("Location: takeAttendance.php?tblclassteacher_Id=".$Id);
      exit; // Stop further execution
    }
  }












?>

