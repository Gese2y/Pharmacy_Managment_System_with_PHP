<?php
require_once('../assets/constants/config.php');

include('../header/PHheader.php');
  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='pharmacist')";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) { 

if (isset($_POST['search'])) {
  $checkun = $_POST['item_id'];
$q=$_POST['quan'];
$cu=$_POST['customer'];
$D=date('y-m-d');
$qua=$_POST['quan'];
$coun=$_POST['country'];
  $sqlup="DELETE FROM `sold_item` WHERE Quantity=0";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
   
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }

  if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";

    $query6="SELECT * FROM item WHERE item_id='$checkun' AND Country='$coun' and store='$SStore' ORDER BY Expired_date ASC LIMIT 1";
  $result6_run=mysqli_query($con,$query6);
  if (mysqli_num_rows($result6_run)==1) {
   $r=mysqli_fetch_array($result6_run);
   $cat=$r['Catagory_name'];
   $Iname=$r['Item_name'];
   $unit=$r['unit'];
   $st=$r['store'];
   
   $price=$r['sales_price'];
   $Sprice=$qua*$price;

   $Solditem="INSERT INTO `sold_item`(`item_id`, `Catagory_name`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`,`from_store`) VALUES ('$checkun','$cat','$Iname','$unit','$qua','$coun','$Sprice','$nameUs1','$cu','$D','Store 1')";
   $resultSol=mysqli_query($con,$Solditem);
       if ($resultSol===true) {
   
     } else {
      
      echo "check your enserted item id, that must be unique";
    }
  }else{
    $errors[]="user name does not exist";
  }


  $updateitem="UPDATE item SET Quantity = Quantity - '$q' WHERE item_id = $checkun AND Country='$coun' and store='$SStore' ORDER BY Entered_date ASC LIMIT 1;";
  
       $resultupit=mysqli_query($con,$updateitem);
       if ($resultupit===true) {
   
     } else {
      echo "Error: " . $updateitem . "<br>" . mysqli_error($con);
    }


  $updateitemD="UPDATE itemdetail SET Quantity = Quantity - '$q' WHERE item_id = $checkun";
  
       $resultupitD=mysqli_query($con,$updateitemD);
       if ($resultupitD===true) {
   
     } else {
      echo "Error: " . $updateitemD . "<br>" . mysqli_error($con);
    }
}else if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";

    $query6="SELECT * FROM item WHERE item_id='$checkun' AND Country='$coun' and store='$SStore' ORDER BY Expired_date ASC LIMIT 1";
  $result6_run=mysqli_query($con,$query6);
  if (mysqli_num_rows($result6_run)==1) {
   $r=mysqli_fetch_array($result6_run);
   $cat=$r['Catagory_name'];
   $Iname=$r['Item_name'];
   $unit=$r['unit'];
   
   $st=$r['store'];
   
   $price=$r['sales_price'];
   $Sprice=$qua*$price;

   $Solditem="INSERT INTO `sold_item`(`item_id`, `Catagory_name`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`,`from_store`) VALUES ('$checkun','$cat','$Iname','$unit','$qua','$coun','$Sprice','$nameUs1','$cu','$D','Store 2')";
   $resultSol=mysqli_query($con,$Solditem);
       if ($resultSol===true) {
   
     } else {
      
      echo "check your enserted item id, that must be unique";
    }
  }else{
    $errors[]="user name does not exist";
  }


  $updateitem="UPDATE item SET Quantity = Quantity - '$q' WHERE item_id = $checkun AND Country='$coun' and store='$SStore' ORDER BY Entered_date ASC LIMIT 1;";
  
       $resultupit=mysqli_query($con,$updateitem);
       if ($resultupit===true) {
   
     } else {
      echo "Error: " . $updateitem . "<br>" . mysqli_error($con);
    }


  $updateitemD="UPDATE itemdetail2 SET Quantity = Quantity - '$q' WHERE item_id = $checkun";
  
       $resultupitD=mysqli_query($con,$updateitemD);
       if ($resultupitD===true) {
   
     } else {
      echo "Error: " . $updateitemD . "<br>" . mysqli_error($con);
    }
}

}

if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";
$queryid = "SELECT * FROM `item` WHERE store='$SStore'";



// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);

$options = "";

$queryCat="SELECT * FROM `item` WHERE store='$SStore'";
$resultcat=mysqli_query($con,$queryCat);


while($rowid = mysqli_fetch_array($resultcat))
{
    $options = $options."<option value='$rowid[2]'>$rowid[2]</option>";
}

?>
<style type="text/css">
     .main {
       
        margin: 0em auto;
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Sales</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Sales
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
 <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-heading" style="text-align: center;">
                <img src=" shopping-512.png" style="width: 10%; border-radius: 10%;">
                <h3 class="panel-title">Sales Item </h3>
                </div>
 <div class="card-content collapse show">
                                    <div class="card-body">
<div style="margin: 0em auto;" class="col-md-8">
	<form action="" method="POST">
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputZip">Item</label>
  <select name="item_id" id="select"  class="form-control mb-1" required>
    <option>---select or search Item Id---</option>
                                                                 <?php echo $options;?>
                                                            </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Country (optional)</label>
      <select id="select1" name="country" class="form-control mb-1" >
        <option>---select or search country---</option>
    <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
	<option value="<?php echo $rowid1[8];?>"><?php echo $rowid1[8];?></option>
	<?php endwhile;?>
  </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Quantity</label>
      <input type="text" class="form-control" id="inputCity" name="quan" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Sales To</label>
      <input list="browser1" name="customer" class="form-control" placeholder="write or select customer">
  <datalist id="browser1">
<option value="unknown"></option>
    <?php 
$queryidCu="SELECT * FROM  `customer_details`";
$resultiCu= mysqli_query($con, $queryidCu);
while($rowidCu = mysqli_fetch_array($resultiCu)):;?>
    <option value="<?php echo $rowidCu[1];?>"></option>
    <?php endwhile;?>
  </datalist>
    </div>
  </div>

      <button type="submit" name="search" class="btn btn-primary"><i class="las la-coins">SELL</i></button>
</div>

  <?php


if (isset($_POST['search'])) {
  $item_id=$_POST['item_id'];
  	$today=date('y-m-d');
  	$customer=$_POST['customer'];
  	$quan=$_POST['quan'];

  $query5="SELECT * FROM item WHERE item_id='$item_id' ORDER BY Expired_date ASC LIMIT 1";
  $query5_run = mysqli_query($con,$query5);
  while ($row = mysqli_fetch_array($query5_run)) {
  	$qItD="SELECT * FROM itemdetail2 WHERE item_id='$item_id'";
  	$qItdR=mysqli_query($con,$qItD);
  	while ( $rItD= mysqli_fetch_array($qItdR)) {
  	
    ?>
      <div class="card card-body">
      	<h2 class="text-center"> <b><u>Sales Specification</u></b></h2><br><br>
  	<div class="form-row">
  		<div class="form-group col-md-4">
      
   <p><b>Date: </b><?php echo $today; ?></p><br>
   <p><b>Sold By: </b><?php echo $nameUs1;?></p><br>
   <p><b>Sales To (Customer Name): </b><?php echo $customer;?></p><br>
   <p><b>Item Name: </b><?php echo $row['Item_name'];?></p>
    </div>
    <div class="form-group col-md-3">
      
   
   <p><b>Item Price: </b><?php echo $row['Item_price']; ?></p><br>
   <p><b>Quantity: </b><?php echo $quan; ?></p><br>
   <p><b>Sales Price: </b><?php echo $row['sales_price']*$quan; ?></p><br>
   <p><b>Manufactured In: </b><?php echo $row['Country']; ?></p>
    </div>
    <div class="form-group col-md-4">
    	   
   <p><b>Manufactured Date: </b><?php echo $row['Produced_Date']; ?></p><br>
   <p><b>Expired Date: </b><?php echo $row['Expired_date']; ?></p><br>
   <p><b>Side Effect: </b><?php echo $rItD['side_effect']; ?></p><br>
   <p><b>Manufactured In: </b><?php echo $row['Description']; ?></p><br>
    </div>
  </div>
  </div>

    <?php
  }}
}}
 if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";
$queryid = "SELECT * FROM `item` WHERE store='$SStore'";



// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);

$options = "";

$queryCat="SELECT * FROM `item` WHERE store='$SStore'";
$resultcat=mysqli_query($con,$queryCat);


while($rowid = mysqli_fetch_array($resultcat))
{
    $options = $options."<option value='$rowid[2]'>$rowid[2]</option>";
}

?>
<style type="text/css">
     .main {
       
        margin: 0em auto;
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Sales</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Sales
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
 <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-heading" style="text-align: center;">
                <img src=" shopping-512.png" style="width: 10%; border-radius: 10%;">
                <h3 class="panel-title">Sales Item </h3>
                </div>
 <div class="card-content collapse show">
                                    <div class="card-body">
<div style="margin: 0em auto;" class="col-md-8">
  <form action="" method="POST">
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputZip">Item</label>
  <select name="item_id" id="select"  class="form-control mb-1" required>
                                                                 <?php echo $options;?>
                                                            </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Country (optional)</label>
      <select id="select1" name="country" class="form-control mb-1" >
    <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
  <option value="<?php echo $rowid1[8];?>"><?php echo $rowid1[8];?></option>
  <?php endwhile;?>
  </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Quantity</label>
      <input type="text" class="form-control" id="inputCity" name="quan">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Sales To</label>
      <input list="browser1" name="customer" class="form-control" placeholder="write or select customer">
  <datalist id="browser1">

    <?php 
$queryidCu="SELECT * FROM  `customer_details`";
$resultiCu= mysqli_query($con, $queryidCu);
while($rowidCu = mysqli_fetch_array($resultiCu)):;?>
    <option value="<?php echo $rowidCu[1];?>"></option>
    <?php endwhile;?>
  </datalist>
    </div>
  </div>

      <button type="submit" name="search" class="btn btn-primary"><i class="las la-coins">SELL</i></button>
</div>

  <?php


if (isset($_POST['search'])) {
  $item_id=$_POST['item_id'];
    $today=date('y-m-d');
    $customer=$_POST['customer'];
    $quan=$_POST['quan'];

  $query5="SELECT * FROM item WHERE item_id='$item_id' ORDER BY Expired_date ASC LIMIT 1";
  $query5_run = mysqli_query($con,$query5);
  while ($row = mysqli_fetch_array($query5_run)) {
    $qItD="SELECT * FROM itemdetail WHERE item_id='$item_id'";
    $qItdR=mysqli_query($con,$qItD);
    while ( $rItD= mysqli_fetch_array($qItdR)) {
    
    ?>
      <div class="card card-body">
        <h2 class="text-center"> <b><u>Sales Specification</u></b></h2><br><br>
<div class="form-row">
      <div class="form-group col-md-4">
      
   <p><b>Date: </b><?php echo $today; ?></p><br>
   <p><b>Sold By: </b><?php echo $nameUs1;?></p><br>
   <p><b>Sales To (Customer Name): </b><?php echo $customer;?></p><br>
   <p><b>Item Name: </b><?php echo $row['Item_name'];?></p>
    </div>
    <div class="form-group col-md-3">
      
   
   <p><b>Item Price: </b><?php echo $row['Item_price']; ?></p><br>
   <p><b>Quantity: </b><?php echo $quan; ?></p><br>
   <p><b>Sales Price: </b><?php echo $row['sales_price']*$quan; ?></p><br>
   <p><b>Manufactured In: </b><?php echo $row['Country']; ?></p>
    </div>
    <div class="form-group col-md-4">
         
   <p><b>Manufactured Date: </b><?php echo $row['Produced_Date']; ?></p><br>
   <p><b>Expired Date: </b><?php echo $row['Expired_date']; ?></p><br>
   <p><b>Side Effect: </b><?php echo $rItD['side_effect']; ?></p><br>
   <p><b>Manufactured In: </b><?php echo $row['Description']; ?></p><br>
    </div>
  </div>
  </div>

    <?php
  }}
}}
  ?>
   </form>

                                    </div>
                                </div>



                      </div>
          </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->
            </div>
    <!-- END: Content-->
<?php
  }
  else{
    echo "<h1 style='color:red'>".$nameUs1." you are not granted to record item <h1>";
    echo "<a href='logout.php' class='w3-bar-item w3-button' id='topNavLogout'><i class='glyphicon glyphicon-log-out'></i>Login with another user</a>";
  }

?>
    <?php include 'footer.php'; ?>