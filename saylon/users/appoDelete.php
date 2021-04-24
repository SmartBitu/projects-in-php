<?php
 include '../loginSystem/partials/_dbconnect.php';
 session_start();
 $_SESSION['sno']=$sno;
 $sql= "DELETE FROM `appoinment` WHERE sno='$sno';";
 //mysqli_query($conn, "DELETE FROM `appoinment` WHERE sno='$sno'");
 if(mysqli_query($conn,$sql)){
    
    //$_SESSION['message'] = "Appoinment Deleted Successfully";
    //$_SESSION['message'] = "$sno";
    header("location: appodetailsUser.php");
  } else {
    $_SESSION['message'] = "Appoinment not Deleted Successfully";
    header('location: appodetailsUser.php');
  }
?>