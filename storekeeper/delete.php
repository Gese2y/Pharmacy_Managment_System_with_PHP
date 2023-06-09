<?php
require_once('../assets/constants/config.php');

  $id=$_GET['id']; 
  $sqlSe="SELECT * FROM item WHERE no='$id'";
  $resSe=mysqli_query($con,$sqlSe);
  $row=mysqli_fetch_array($resSe);
   $ST=$row['store'];
  $Itid=$row['item_id'];
  $quan=$row['Quantity'];
    $sqlup="DELETE FROM `item` WHERE no='$id' ";
       $resultup=mysqli_query($con,$sqlup);
      
       if ($resultup===true) {
   header('location:deletemedicine.php');
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
        if ($ST=='Store 1') {
      $sqlUp="UPDATE `itemdetail` SET `Quantity`= Quantity-$quan WHERE item_id='$Itid'";
$resulUp=mysqli_query($con,$sqlUp);
       if ($resulUp===true) {
   
     }}
     else if ($ST=='Store 2') {
      $sqlUp="UPDATE `itemdetail2` SET `Quantity`= Quantity-$quan WHERE item_id='$Itid'";
$resulUp=mysqli_query($con,$sqlUp);
       if ($resulUp===true) {
   
     }
    }

  
?>