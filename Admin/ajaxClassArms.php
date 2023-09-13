<?php

    include '../dbcon.php';

    $cid = intval($_GET['cid']);//

    $queryss=mysqli_query($conn,"SELECT * FROM tblclassarms WHERE classId=".$cid." AND isAssigned = 0");                        
    if(mysqli_num_rows($queryss) > 0) {
        echo ' <select required name="classArmId" class="form-control mb-3"> ';
        echo ' <option value="">--Select Course--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
            echo ' <option value="'.$row['Id'].'" >'.$row['classArmName'].'</option>';
        }
        echo ' </select> ';
    } else {
        echo ' <select required name="classArmId" class="form-control mb-3"> ';
        echo ' <option value="" selected>No course record found</option> ' ;
        echo ' </select> ';
       
    }
    
?>

