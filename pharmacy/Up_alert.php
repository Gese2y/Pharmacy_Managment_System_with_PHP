<?php 
require_once('../assets/constants/config.php');
   session_start();
$name=  $_SESSION['username'];

   $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT `alert_no`, `alert_title`, `content`, `alert_date`, `status` FROM `alert2` WHERE  alert_no='$id'");
  $row=mysqli_fetch_array($query);
  $stat=$row['status'];
  echo "$stat";
    if ($stat=='view') {
      $upre="UPDATE `alert2` SET status='viewed by $name' WHERE alert_no='$id'";
$up=mysqli_query($con,$upre);
if ($up===true) {
  header('location: alert.php');
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
  }else
  {
          $upre="UPDATE `alert2` SET status='$stat, $name' WHERE alert_no='$id'";
$up=mysqli_query($con,$upre);
if ($up===true) {
   header('location: alert.php');
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
  }



 ?>