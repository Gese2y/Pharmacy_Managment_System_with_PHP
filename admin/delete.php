<?php
require_once('../assets/constants/config.php');

  $id=$_GET['id'];
    $sqlup="DELETE FROM `item` WHERE `item_id` = '$id'";
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
   header('location:deletemedicine.php');
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }

  
?>