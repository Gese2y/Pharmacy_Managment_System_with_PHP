<?php
require_once('../assets/constants/config.php');
   session_start();

  if (!isset($_SESSION['username'])) { 
  $_SESSION['msg'] = "You have to log in first"; 
  header('location: index.php');

} 
$Gname= $_SESSION['username'];
  $sqlUs1 = "SELECT role,Employee_id FROM user WHERE username='$Gname'";
$reUs1 = mysqli_query($con,$sqlUs1);
  $row122 = mysqli_fetch_array($reUs1);
  $res22=$row122['role'];
   $resId1=$row122['Employee_id'];
  $regUser1="SELECT * FROM Employee WHERE Role='$res22' AND Employee_id='$resId1' ";
  $resUs1=mysqli_query($con,$regUser1);
      $row211 = mysqli_fetch_array($resUs1);
 $nameUs1=$row211['First_name']." ".$row211['Last_name'];

$errors=array();
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * from `item` where no='$id'");
  $row=mysqli_fetch_array($query);
  $ST=$row['store'];
  $Itid=$row['item_id'];
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
$Sa_Pr=$_POST['Sa_Pr'];
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


  $sqlup="UPDATE item SET  item_id='$It_Id', Catagory_name='$Cat_Id', Item_name='$It_Na',unit='$Un',Quantity=Quantity+'$quan', Item_price='$It_Pr',sales_price='$Sa_Pr', Country='$Coun', Produced_Date='$Pr_Da', Expired_date='$Ex_Da', Entered_date='$En_Da', Shelf_no='$Sh_No', supplier_name='$Su_Id',  Status='updated by $nameUs1' where no='$id'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
     } else  {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }

    if ($ST=='Store 2') {
      $sqlid="UPDATE itemdetail2 SET Quantity=Quantity+'$quan' where item_id='$Itid'";
  
       $resultupid=mysqli_query($con,$sqlid);
       if ($resultupid===true) {
     } else  {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
    }else if ($ST=='Store 1') {
      $sqlid="UPDATE itemdetail SET Quantity=Quantity+'$quan' where item_id='$Itid'";
  
       $resultupid=mysqli_query($con,$sqlid);
       if ($resultupid===true) {
     } else  {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
    }
    
    header("Location: editmedicine.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
    <link href="../assets/BodyText.css" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.css">
    
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/selects/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/extensions/sweetalert.css">

</head>
<style type="text/css">
   .main {
        background-color: #FFFFFF;
        width: 1000px;
        height: 1250px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
</style>
<body>
    
  <div style="background-color:  #5B5EA6;">
      <div class="container" >

        <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
          <div class="col-md-8" style="margin: 0em auto;">
                            <div class="card">
              <div class="panel-heading" style="text-align: center;">
                <img src="Edit-128.png" style="width: 20%; border-radius: 8%;">
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
                
          <div class="card-content collapse show">
                                    <div class="card-body">    
                <form class="form-horizontal" action="" method="POST">
                      <div class="form-row">
   
  <div class="form-group col-md-4">
     <h5>Category Name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text"  name="Cat_Id" value="<?php echo $row['Catagory_name']?>" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>                          
                            
    <div class="form-group col-md-4">
      <h5>Item Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control mb-1" name="It_Id" value="<?php echo $row['item_id']?>" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>
  <div class="form-group col-md-4">
      <div class="control">
    <h5>Item Name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control mb-1" name="It_Na" value="<?php echo $row['Item_name']?>">
                                                        </div>                                    
    </div>
    </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
     <h5>Quantity <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" value="<?php echo $row['Quantity']?>" class="form-control mb-1">
                                                        </div>
    </div>
    <div class="form-group col-md-4">
     <h5>New Quantity(optional) <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text"  name="quan" placeholder="enter new quantity" class="form-control mb-1">
                                                        </div>
    </div>
    <div class="form-group col-md-4">
     <h5>Unit </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text"  name="Un" value="<?php echo $row['unit']?>" class="form-control mb-1">
                                                            </div>
                                                        </div>
    </div>

  </div>
<div class="form-row">
    <div class="form-group col-md-4">
      <h5>Item Price </h5>
                                                        <div class="controls">
                                                            <input type="text"  name="It_Pr" value="<?php echo $row['Item_price']?>" class="form-control mb-1" placeholder="Barcode">
                                                        </div>
    </div>
      <div class="form-group col-md-4">
      <h5>Sales Price </h5>
                                                        <div class="controls">
                                                            <input type="text"  name="Sa_Pr" value="<?php echo $row['sales_price']?>" class="form-control mb-1" placeholder="Barcode">
                                                        </div>
    </div>
   <div class="form-group col-md-4">
<h5>Manufactured Date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date" name="Pr_Da" value="<?php echo $row['Produced_Date']?>" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>                                     
                            
    </div>
    
  </div>
<div class="form-row">
<div class="form-group col-md-4">
<h5>Expire date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date" name="Ex_Da" value="<?php echo $row['Expired_date']?>" class="form-control mb-1" data-validation-required-message="Expire date is required">
                                                            </div>
                                                        </div>
    </div>
  <div class="form-group col-md-4">
<h5>Entered Date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date"  name="En_Da" value="<?php echo $row['Entered_date']?>" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>
    </div>
     <div class="form-group col-md-4">
<h5>Country</h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text" name="Coun" value="<?php echo $row['Country']?>" class="form-control" min="1" />
                                                            </div>
                                                        </div>
    </div>

  </div> 
  <div class="form-row">
    <div class="form-group col-md-4">
<h5>Shelf No <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="number" name="Sh_No" value="<?php echo $row['Shelf_no']?>" class="form-control mb-1" required data-validation-required-message="Sales price is required" min="0">
                                                        </div>
    </div>
  <div class="form-group col-md-4">
<h5>Supplier </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                     <input type="text" name="Su_Id" value="<?php echo $row['supplier_name']?>" class="form-control mb-1">
                                                            </div>
                                                        </div>
    </div>
  </div> 


                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-8">
                              <center><button type="submit" name="Update" class="btn btn-success"><i class="las la-edit"></i>Update Account</button></center>
                          </div>
                        </div>


                     
                    </form>
                  </div></div></div></div>
                </div>
            </div>
          </div>
        </div> 
      </div>
 
</body>
</html>