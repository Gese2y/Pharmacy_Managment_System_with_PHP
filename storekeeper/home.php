 <?php
require_once('../assets/constants/config.php');
include('../header/SKheader.php');
?>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: orange;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: green;
}
</style>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">View Store Status</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Store Stat
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content">
                  <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">
        <div class="container-fluid">
          <?php 
 if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";  ?>
          <div class="row" style="margin: 1em auto;">
            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as SameValue from `item` where store='$SStore'";
     $result = mysqli_query($con,$sqlr);

      $row = mysqli_fetch_array($result);

// expired Item
$sqlEx="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as ExValue from `item` where store='$SStore ' and Status='Item Expired'";
     $resultEx = mysqli_query($con,$sqlEx);

      $rowEx = mysqli_fetch_array($resultEx);
      // expired item finish
      // expired Item
$sqlOt="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as ExValue from `item` where store='$SStore ' and  Status NOT LIKE 'Item Expired'";
     $resultOt = mysqli_query($con,$sqlOt);

      $rowOt = mysqli_fetch_array($resultOt);
      // expired item finish

      $cal= "SELECT `item_id`, `Quantity`, count(item_id) as Calculate from `item` where store='$SStore'";
      $calRes=mysqli_query($con, $cal);
      $calR=mysqli_fetch_array($calRes);?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status in <?php echo $Branch; ?></i></b></h2></center>

                    <h3 class="text-white">There are <?php echo $calR['Calculate'];  ?> different item In The Pharmay</h3>
                  </div>
                  <h3 class="card-title text-white">There Are <?php echo $row['SameValue']; ?> item found in <?php echo $Branch; ?>
                  <table id="customers">
                    <tr>
                      <td>Status</td>
                      <td>Quantity</td>
                    </tr>
                    <tr>
                      <td>Expired Item</td>
                      <td><?php echo $rowEx['ExValue']; ?></td>
                    </tr>
                    <tr>
                      <td>Other</td>
                      <td><?php echo $rowOt['ExValue']; ?></td>
                    </tr>
                  </table>
                  </h3>
                <?php  ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`,Item_name, Sum(Quantity) as SameValue from `item` where store='$SStore' and Quantity>100 Group by item_id  order by Quantity DESC limit 5";
     
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Avilaabled Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $row['SameValue']; ?></span> Avialabled item in the store  
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#store" class="text-primary">view </a>Top 5 item that have many quantity<br>
<div class="collapse" id="store"></b></p>
                  <table id="customers">
                    <tr><td>Item Id</td><td>Item Name</td>
            <td>Total</td></tr>
          <?php  $result = mysqli_query($con,$sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
          
            <tr><td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
            <td><?php echo  $row['SameValue']; ?></td></tr>
            <?php }} ?>
        </table></div></center>
                   
                
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-primary">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php
                  
                  $Ex="SELECT `item_id`, count(item_id) as ExValue from `item` where Status='Item Expired' and store='$SStore'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres);
                  $Low="SELECT `item_id`, count(item_id) as LValue from `item` where Quantity<100 and store='$SStore'";
                  $Lowres=mysqli_query($con,$Low);
                  $LEx=mysqli_fetch_array($Lowres);


 ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">law and Expired Item in <?php echo $Branch;  ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning txt-larg"><i class="fa fa-long-arrow-up"></i>  <?php echo $rEx['ExValue']; ?></span> Expired Item and <span class="text-warning txt-larg"><i class="fa fa-long-arrow-up"></i>  <?php echo $LEx['LValue']; ?></span> Low Item found in the store  
                  </h3>
<p><b><a button data-toggle="collapse" data-target="#Exl" class="text-warning">view </a>Top 5 Low and Expired Item
<div class="collapse" id="Exl">
  <table id="customers">
  <tr>
    <td colspan="3" align="center">expired</td><td colspan="3" align="center">Low</td>
  </tr>
  <tr>
    <td>Id</td><td>Item Name</td><td>Total Sum</td><td>Id</td><td>Item Name</td><td>Toptal Sum</td>
  </tr>
    <?php  $sqlr="SELECT `item_id`,Item_name, Sum(Quantity) as ExTValue from `item` where store='$SStore' and Status='Item Expired'   order by Quantity ASC limit 5";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
        $sqlL="SELECT `item_id`,Item_name, Sum(Quantity) as LTValue from `item` where store='$SStore' and Quantity<100   order by Quantity DESC limit 5";
        $resultL=$con->query($sqlL);
        if ($resultL->num_rows>0) {
          while ( $rowL=$resultL->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
              <td><?php echo $row['ExTValue']; ?></td>
              <td><?php echo $rowL['item_id']; ?></td>
              <td><?php echo $rowL['Item_name']; ?></td>
              <td><?php echo $rowL['LTValue']; ?></td>
            </tr>
          
   <?php 
       }}}} ?>
     
</table>

</div>
                </div>
                <div class="card-footer">
                  <div class="stats text-white">
                    Get More Information about <a href="expired_item" class="text-warning">Expired item</a> and <a href="low_item" class="text-warning">Low item</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else           
 if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";  ?>
           <div class="row" style="margin: 1em auto;">
            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as SameValue from `item` where store='$SStore'";
     $result = mysqli_query($con,$sqlr);

      $row = mysqli_fetch_array($result);

// expired Item
$sqlEx="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as ExValue from `item` where store='$SStore ' and Status='Item Expired'";
     $resultEx = mysqli_query($con,$sqlEx);

      $rowEx = mysqli_fetch_array($resultEx);
      // expired item finish
      // expired Item
$sqlOt="SELECT `item_id`, `Quantity`,Status,Item_name, Sum(Quantity) as ExValue from `item` where store='$SStore ' and  Status NOT LIKE 'Item Expired'";
     $resultOt = mysqli_query($con,$sqlOt);

      $rowOt = mysqli_fetch_array($resultOt);
      // expired item finish

      $cal= "SELECT `item_id`, `Quantity`, count(item_id) as Calculate from `item` where store='$SStore'";
      $calRes=mysqli_query($con, $cal);
      $calR=mysqli_fetch_array($calRes);?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status in <?php echo $Branch; ?></i></b></h2></center>

                    <h3 class="text-white">There are <?php echo $calR['Calculate'];  ?> different item In The Pharmay</h3>
                  </div>
                  <h3 class="card-title text-white">There Are <?php echo $row['SameValue']; ?> item found in <?php echo $Branch; ?>
                  <table id="customers">
                    <tr>
                      <td>Status</td>
                      <td>Quantity</td>
                    </tr>
                    <tr>
                      <td>Expired Item</td>
                      <td><?php echo $rowEx['ExValue']; ?></td>
                    </tr>
                    <tr>
                      <td>Other</td>
                      <td><?php echo $rowOt['ExValue']; ?></td>
                    </tr>
                  </table>
                  </h3>
                <?php  ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`,Item_name, Sum(Quantity) as SameValue from `item` where store='$SStore' and Quantity>100 Group by item_id  order by Quantity DESC limit 5";
     
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Avilaabled Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $row['SameValue']; ?></span> Avialabled item in the store  
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#store" class="text-primary">view </a>Top 5 item that have many quantity<br>
<div class="collapse" id="store"></b></p>
                  <table id="customers">
                    <tr><td>Item Id</td><td>Item Name</td>
            <td>Total</td></tr>
          <?php  $result = mysqli_query($con,$sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
          
            <tr><td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
            <td><?php echo  $row['SameValue']; ?></td></tr>
            <?php }} ?>
        </table></div></center>
                   
                
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-primary">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php
                  
                  $Ex="SELECT `item_id`, count(item_id) as ExValue from `item` where Status='Item Expired' and store='$SStore'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres);
                  $Low="SELECT `item_id`, count(item_id) as LValue from `item` where Quantity<100 and store='$SStore'";
                  $Lowres=mysqli_query($con,$Low);
                  $LEx=mysqli_fetch_array($Lowres);


 ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">law and Expired Item in <?php echo $Branch;  ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning txt-larg"><i class="fa fa-long-arrow-up"></i>  <?php echo $rEx['ExValue']; ?></span> Expired Item and <span class="text-warning txt-larg"><i class="fa fa-long-arrow-up"></i>  <?php echo $LEx['LValue']; ?></span> Low Item found in the store  
                  </h3>
<p><b><a button data-toggle="collapse" data-target="#Exl" class="text-warning">view </a>Top 5 Low and Expired Item
<div class="collapse" id="Exl">
  <table id="customers">
  <tr>
    <td colspan="3" align="center">expired</td><td colspan="3" align="center">Low</td>
  </tr>
  <tr>
    <td>Id</td><td>Item Name</td><td>Total Sum</td><td>Id</td><td>Item Name</td><td>Toptal Sum</td>
  </tr>
    <?php  $sqlr="SELECT `item_id`,Item_name, Sum(Quantity) as ExTValue from `item` where store='$SStore' and Status='Item Expired'   order by Quantity ASC limit 5";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
        $sqlL="SELECT `item_id`,Item_name, Sum(Quantity) as LTValue from `item` where store='$SStore' and Quantity<100   order by Quantity DESC limit 5";
        $resultL=$con->query($sqlL);
        if ($resultL->num_rows>0) {
          while ( $rowL=$resultL->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
              <td><?php echo $row['ExTValue']; ?></td>
              <td><?php echo $rowL['item_id']; ?></td>
              <td><?php echo $rowL['Item_name']; ?></td>
              <td><?php echo $rowL['LTValue']; ?></td>
            </tr>
          
   <?php 
       }}}} ?>
     
</table>

</div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="text-white">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
<?php 
 if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";  ?>
  ?>
                                                  
                                    <center><h2 ><b><u>Store Status in <?php echo $Branch; ?></u></b></a></h2></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          
  <?php?>
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Category</th>
                                                    <th>Item Id</th>
                                                    <th>Item Name </th>
                                                    <th>Unit </th>
                                                    <th>Quantity</th>
                                                    <th>Country</th>
                                                    <th>Sales Price</th>
                                                    <th>Expired Date</th>
                                                    <th>Shelf Number</th>
                                                    <th>Status</th>
                                                    <th>Store</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * from `item` where store='$SStore' ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <?php echo $row['Catagory_name'];?></th>
        <th> <?php echo $row['item_id'];?></th>   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['Status'];?></th>
        <th><?php echo $row['store'];?></th>
      </tr>
     

   <?php
}
      }
    
     
     else{
      echo "0 result";
     }
     $con->close();

 ?>
</table>
</form>
         

                                        </div>
                                    </div>
                                </div>
           
  <?php } else  if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";   ?>

                                   
                                    <center><h2 ><b><u>Store Status in <?php echo $Branch; ?></u></b></a></h2></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          
  <?php?>
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Category</th>
                                                    <th>Item Id</th>
                                                    <th>Item Name </th>
                                                    <th>Unit </th>
                                                    <th>Quantity</th>
                                                    <th>Country</th>
                                                    <th>Sales Price</th>
                                                    <th>Expired Date</th>
                                                    <th>Shelf Number</th>
                                                    <th>Status</th>
                                                    <th>Store</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * from `item` where store='$SStore' ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <?php echo $row['Catagory_name'];?></th>
        <th> <?php echo $row['item_id'];?></th>   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['Status'];?></th>
        <th><?php echo $row['store'];?></th>
      </tr>
     

   <?php
}
      }
    
     
     else{
      echo "0 result";
     }
     $con->close();

 ?>
</table>
</form>
         

                                        </div>
                                    </div>
                                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
     
    </div>
  </div>
<?php include 'footer.php'; ?>