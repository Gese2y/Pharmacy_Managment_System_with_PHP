<?php
require_once('../assets/constants/config.php');
    if (isset($_POST['send'])) {
    	$repid=$_POST['id'];
  $imgFile = $_FILES['image']['name'];
 $tmp_dir = $_FILES['image']['tmp_name'];
 $imgSize = $_FILES['image']['size']; 
 
 if(!empty($imgFile))
 {

 $upload_dir = 'image/'; // upload directory
 
 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
 
 // valid image extensions
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','pdf','doc'); // valid extensions
 
 // rename uploading image
 $coverpic = rand(1000,1000000).".".$imgExt;
 
 // allow valid image file formats
 if(in_array($imgExt, $valid_extensions)){ 
 // Check file size '5MB'
 if($imgSize < 5000000) {
 move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
 }
 else{
 $errMSG = "Sorry, your file is too large.";
 }
 }
 else{
 $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
 }

//For Database Insertion
 // if no error occured, continue ....

 

 }

        $UpRep="UPDATE `report` SET `document`='$coverpic' WHERE report_id='$repid'";
        $resulUpRep=mysqli_query($con,$UpRep);
       if ($resulUpRep===true) {
   
     } else {
      
      $errors[]= " check your enserted item id, that must be unique";
    }
    header("Location: newitemrep.php");
    }
 ?>