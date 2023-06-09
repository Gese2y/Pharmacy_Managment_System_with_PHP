<?php 
require_once('../assets/constants/config.php');

  $id=$_GET['id'];
  $upre="UPDATE `request` SET status='accepted' WHERE `request_id`='$id'";
$up=mysqli_query($con,$upre);
if ($up===true) {
  
   header('location:view_request.php');
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }

 ?>