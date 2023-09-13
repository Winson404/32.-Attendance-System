<?php

include("../dbcon.php");
include("XLSXLibrary.php");


if(isset($_GET['teacherId'])&&isset($_GET['classId'])&&isset($_GET['classArmId'])) {
  $classTeacherId = $_GET['classTeacherId'];
  $teacherId      = $_GET['teacherId'];
  $classId        = $_GET['classId'];
  $classArmId     = $_GET['classArmId'];

  $dateTimeTaken = date('Y-m-d');
  $exportDate = date('F d, Y h:i A');


  // GET PROGRAM AND COURSE NAME
  $get = mysqli_query($conn, "SELECT *, tblclassteacher.Id AS tblclassteacher_Id, tblclassarms.Id AS tblclassarms_Id, tblclass.Id AS tblclass_Id FROM tblclassteacher JOIN tblclassarms ON tblclassteacher.classArmId=tblclassarms.Id JOIN tblclass ON tblclassteacher.classId=tblclass.Id JOIN tblteacher ON tblclassteacher.teacherId=tblteacher.Id WHERE tblclassteacher.Id='$classTeacherId'");
  $row_get = mysqli_fetch_array($get);
  $progName = $row_get['className'].' - '.$row_get['classArmName'];

  $act = mysqli_query($conn, "SELECT * FROM tblsessionterm JOIN tblterm ON tblsessionterm.termId=tblterm.Id WHERE isActive=1");
  $r_act = mysqli_fetch_array($act);
  $sessionName = $r_act['sessionName'];
  $termName = $r_act['termName'];


  $reportAttendance = [
        ['No.', 'Student ID', 'Student Name', 'Program', 'Course', 'School Year', 'Semester', 'Status', 'Date']
      ];

      $id = 0;
      $sql = "SELECT *, tblattendance.dateTimeTaken AS tblattendance_date FROM tblattendance 
              JOIN tblclass ON tblattendance.classId=tblclass.Id 
              JOIN tblclassarms ON tblattendance.classArmId=tblclassarms.Id 
              JOIN tblstudents ON tblattendance.admissionNo=tblstudents.admissionNumber 
              WHERE tblattendance.teacherId='$teacherId' AND tblattendance.classId='$classId' AND tblattendance.classArmId='$classArmId' AND DATE(dateTimeTaken)='$dateTimeTaken' 
              GROUP BY tblattendance.admissionNo 
              ORDER BY tblstudents.lastName";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $stat = "";
          if($row['status'] == 1) { $stat = "Present"; } else { $stat = "Absent"; }
          $name = $row['firstName']. ' ' .$row['otherName']. ', ' .$row['lastName'];
          $reportAttendance = array_merge($reportAttendance, array(array($id, $row['admissionNumber'], $name, $row['className'], $row['classArmName'], $sessionName, $termName, $stat, date("F d, Y", strtotime($row['dateTimeTaken'])))));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: reportAttendance.php?tblclassteacher_Id=".$classTeacherId);
      }

      $xlsx = SimpleXLSXGen::fromArray($reportAttendance);
      $xlsx->downloadAs(''.$progName.' - '.$exportDate.' .xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('documentsIncome.xlsx'); // This will save the file to your server

      echo "<pre>";

      print_r($reportAttendance);

      header("Location: reportAttendance.php?tblclassteacher_Id=".$classTeacherId);
}


