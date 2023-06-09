	<?php
require_once('../assets/constants/config.php');
	$today=date('y-m-d');
     $sqlr="SELECT * FROM item ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      	$Exdate=$row['Expired_date'];
      	$itemid=$row['item_id'];
      	$store=$row['store'];
      	$Ex_D=strtotime($Exdate);
      	$To_D=strtotime($today);
      	$Diff=$Ex_D - $To_D;

      	$x=abs(floor($Diff/(60 * 60 * 24)));  
      for ($i=0; $i <10 ; $i++) { 
        # code...
      }
    if ($store=='Store 1') {
      $s1="SELECT * FROM itemdetail WHERE Quantity<200";
      $ress1 = $con->query($s1);
     if ($ress1 ->num_rows > 0) {
      while ($rows1 = $ress1->fetch_array()) {
        $Itemid=$rows1['item_id'];
$updatelow="UPDATE itemdetail SET Status='Low Item' WHERE   item_id='Itemid'";
  
       $resultlow=mysqli_query($con,$updatelow);
       if ($resultlow===true) {
         $updatelowi="UPDATE item SET Status='Low Item' WHERE item_id='Itemid' and store='Store 1'";
  
       $resultlowi=mysqli_query($con,$updatelowi);
       $count="SELECT item_id, count(item_id) as cou FROM itemdetail WHERE Quantity<10";
        $rescount=mysqli_query($con,$count);
        $rowc=mysqli_fetch_array($rescount);
        $cont=$rowc['cou'];
       $lows1="INSERT INTO `alert2`( `alert_title`, `content`, `alert_date`, `status`) VALUES ('low_item','$cont low item','Low item in Sore 1 on $today','view')";
        $reslow1=mysqli_query($con,$lows1);
       }
      }}

      $unav="SELECT * FROM itemdetail WHERE Quantity=0";
      $resunav = $con->query($unav);
     if ($resunav ->num_rows > 0) {
      while ($rowsunav = $resunav->fetch_array()) {
        $Itemid=$rowsunav['item_id'];
$updateunav="UPDATE itemdetail SET Status='Unavialabel Item' WHERE   item_id='Itemid'";
  
       $resultunav=mysqli_query($con,$updateunav);
       if ($resultunav===true) {
         $updateunavi="UPDATE item SET Status='Unavialabel Item' WHERE item_id='Itemid' and store='Store 1'";
  
       $resultunavi=mysqli_query($con,$updateunavi);
       $counav="SELECT item_id, count(item_id) as counav FROM itemdetail WHERE Quantity=0";
        $rescounav=mysqli_query($con,$counav);
        $rowunav=mysqli_fetch_array($rescounav);
        $counavi=$rowunav['counav'];
       $lows1="INSERT INTO `alert2`( `alert_title`, `content`, `alert_date`, `status`) VALUES ('unavilable_item','$counavi item not found','Low item in Sore 1 on $today','view')";
        $reslow1=mysqli_query($con,$lows1);
       }
      }}
      
    }else if ($store=='Store 2') {
$s2="SELECT * FROM itemdetail2 WHERE Quantity<5236";
      $ress2 = $con->query($s2);
     if ($ress2 ->num_rows > 0) {
      while ($rows2 = $ress2->fetch_array()) {
        $Itemid2=$rows2['item_id'];

      $updatelow2="UPDATE itemdetail2 SET Status='Low Item' WHERE   item_id='$Itemid2'";
  
       $resultlow2=mysqli_query($con,$updatelow2);
       if ($resultlow2===true) {
         $updatelowi2="UPDATE item SET Status='Low Item' WHERE  item_id='$Itemid2' and store='Store 2'";
  
       $resultlowi2=mysqli_query($con,$updatelowi2);
       $count="SELECT item_id, count(item_id) as cou FROM itemdetail2 WHERE Quantity<5236";
        $rescount=mysqli_query($con,$count);
        $rowc=mysqli_fetch_array($rescount);
        $cont=$rowc['cou'];
       $lows12="INSERT INTO `alert2`( `alert_title`, `content`, `alert_date`, `status`) VALUES ('low_item','$cont low item','Low item in Sore 2 on $today','view')";
        $reslow12=mysqli_query($con,$lows12);
    }}}

      $unav="SELECT * FROM itemdetail WHERE Quantity=0";
      $resunav = $con->query($unav);
     if ($resunav ->num_rows > 0) {
      while ($rowsunav = $resunav->fetch_array()) {
        $Itemid=$rowsunav['item_id'];
$updateunav="UPDATE itemdetail SET Status='Unavialabel Item' WHERE   item_id='Itemid'";
  
       $resultunav=mysqli_query($con,$updateunav);
       if ($resultunav===true) {
         $updateunavi="UPDATE item SET Status='Unavialabel Item' WHERE item_id='Itemid' and store='Store 2'";
  
       $resultunavi=mysqli_query($con,$updateunavi);
       $counav="SELECT item_id, count(item_id) as counav FROM itemdetail WHERE Quantity=0";
        $rescounav=mysqli_query($con,$counav);
        $rowunav=mysqli_fetch_array($rescounav);
        $counavi=$rowunav['counav'];
       $lows1="INSERT INTO `alert2`( `alert_title`, `content`, `alert_date`, `status`) VALUES ('unavilable_item','$counavi item not found','Low item in Sore 2 on $today','view')";
        $reslow1=mysqli_query($con,$lows1);
       }
      }}
      }

      // if ($x<3) {
      	  $sqlup="UPDATE item SET Status='Item Expired' WHERE Expired_date LIKE '%$today%'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {

        $count="SELECT item_id, count(item_id) as cou FROM item WHERE Status='Item Expired'";
        $rescount=mysqli_query($con,$count);
        $rowc=mysqli_fetch_array($rescount);
        $cont=$rowc['cou'];
        $Exalert="INSERT INTO `alert2`( `alert_title`, `content`, `alert_date`, `status`) VALUES ('expired_item','$cont item Expired','Expired on $today','view')";
        $resAl=mysqli_query($con,$Exalert);
     }
      else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }


      
        
          
  }
}
     
	?>