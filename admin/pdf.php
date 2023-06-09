<?php
require_once('../assets/constants/config.php');
 	 $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * FROM `report` WHERE report_id='$id'");
  $row11=mysqli_fetch_array($query); 
  
 ?>
 <embed src="image/<?php echo $row11['document']; ?>" type='application/pdf' width='100%' height='700px'/>