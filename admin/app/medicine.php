<?php
require_once('../assets/constants/config.php');
   session_start();

  if (!isset($_SESSION['username'])) { 
  $_SESSION['msg'] = "You have to log in first"; 
  header('location: LoginSK.php'); 
} 

$errors=array();
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * from `item` where item_id='$id'");
  $row=mysqli_fetch_array($query);
if (isset($_POST['Update'])) {
$Cat_Id=$_POST['Cat_Id'];
$It_Id=$_POST['It_Id'];
  $It_Na=$_POST['It_Na'];
  $quan=$_POST['quan'];
  $Un=$_POST['Un'];
  $It_Pr=$_POST['It_Pr'];
  $Pr_Da=$_POST['Pr_Da'];
  $Ex_Da=$_POST['Ex_Da'];
  $En_Da=$_POST['En_Da'];
  $Sh_No=$_POST['Sh_No'];
  $Su_Id=$_POST['Su_Id'];
  $Coun=$_POST['Coun'];

if (empty($Cat_Id)||empty($It_Id)||empty($It_Na)||empty($Coun)) {
    if ($Cat_Id=="") {
      $errors[]="username is required";
    }
    if ($It_Na=="") {
      $errors[]="password is required";
    }
     if ($It_Id=="") {
      $errors[]="Employee Id is required";
    }
     if ($Coun=="") {
      $errors[]="Email Address is required";
    }
  }
  $sqlup="UPDATE item SET  item_id='$It_Id', Catagory_id='$Cat_Id', Item_name='$It_Na',unit='$Un',Quantity='$quan', Item_price='$It_Pr', Country='$Coun', Produced_Date='$Pr_Da', Expired_date='$Ex_Da', Entered_date='$En_Da', Shelf_no='$Sh_No', Supplier_id='$Su_Id' where item_id='$id'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
     } else  {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
    header("Location:catagory.php");
ob_end_flush();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-theme.min.css">
  <!--font awesome-->
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/fontawesome.min.css">
  <!--custome css-->
  <link rel="stylesheet" type="text/css" href="custom/css/custom.css">
  <!--bootstarp js-->
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!--jquery-->
  <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
      <link rel="stylesheet" href="w3.css"> 
  <!--jqueryui-->
  <link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">
  <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
</head>
<body>
    
  <div style="background-color:  #5B5EA6;">
      <div class="container" >

        <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
          <div class="col-md-6 col-md-offset-4">
            <div class="panel panel-info">
              <div class="panel-heading" style="text-align: center;">
                <img src="assets/image/medicine-box-icon.png" style="width: 30%; border-radius: 8%;">
                <h3 class="panel-title">Add Item </h3>
                </div>
                <div class="panel-body">
                    <div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert">'.$value.'</div>';
                         }
                       }?>
                    </div>
                
             
                <form class="form-horizontal" action="" method="POST">
                      <div class="form-group">
                         <label class="control-label col-sm-3" for="username">Catagory Id:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="Cat_Id" value="<?php echo $row['Catagory_id']?>">
                            </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-sm-3" for="username">Item Id:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="It_Id" value="<?php echo $row['item_id']?>">
                            </div>
                        </div>
                        
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Item Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="It_Na" value="<?php echo $row['Item_name']?>" >
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">unit:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="Un" value="<?php echo $row['unit']?>" >
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Quantity:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="quan" value="<?php echo $row['Quantity']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Item price:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="It_Pr" value="<?php echo $row['Item_price']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Produced Date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="Pr_Da" value="<?php echo $row['Produced_Date']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Expired date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="Ex_Da" value="<?php echo $row['Expired_date']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Entered date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="En_Da" value="<?php echo $row['Entered_date']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Country:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Coun" value="<?php echo $row['Country']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Shelf Number:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Sh_No" value="<?php echo $row['Shelf_no']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Supplier Id:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Su_Id" value="<?php echo $row['Supplier_id']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-8">
                              <center><button type="submit" name="Update" class="btn btn-success"><i class="glyphicon glyphicon-update"></i>Update Account</button></center>
                          </div>
                        </div>


                     
                    </form>
                </div>
            </div>
          </div>
        </div> 
      </div>
 
</body>
</html>