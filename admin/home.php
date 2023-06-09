 <?php
require_once('../assets/constants/config.php');
include('../header/SKheader.php');
?>
<br><br>
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row" style="margin: 1em auto;">
            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as SameValue from `sold_item`  GROUP BY item_id";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Sold Item</i></b></h2></center>

                    <h3 class="text-white">Over All Transaction In The Pharmay</h3>
                  </div>
                  <h3 class="card-title text-white">There Are <?php echo $row['SameValue']; ?> item solds Over All transaction  
                  </h3>
                <?php }} ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="vieTraStat">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status</i></b></h2></center>
                    <h3 class="text-white">Over All Avialabled Item in the store</h3>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $row['SameValue']; ?></span> Avialabled in the store  
                  </h3>
                <?php }} ?>
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
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status</i></b></h2></center>
                    <h3 class="text-white">Over All Item that Found in the store</h3>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning txt-larg"><i class="fa fa-long-arrow-up"></i>  <?php echo $row['SameValue']; ?></span> Item found in the store  
                  </h3>
                <?php }} ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="text-white">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button data-toggle="collapse" data-target="#demo">Collapsible</button>

<div id="demo" class="collapse">
Lorem ipsum dolor text....
</div>
<?php 
 if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";  ?>
          <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">                                    
                                    <center> <a button data-toggle="collapse" data-target="#demo1" ><h2 ><b><u>All Transaction</u></b></h2></a> </center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                <div class="card-content collapse" id="demo1">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          
  <?php?>
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Item Id</th>
                                                    <th>Item Name </th>
                                                    <th>Unit </th>
                                                    <th>Quantity</th>
                                                    <th>Country</th>
                                                    <th>Sales Price</th>
                                                    <th>Sold By</th>
                                                    <th>Customer Name</th>
                                                    <th>Sold Date</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * from `sold_item` ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <?php echo $row['item_id'];?></th>   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Sales_price'];?></th>
        <th><?php echo $row['Sold_by'];?></th>
        <th><?php echo $row['Customer_name'];?></th>
        <th><?php echo $row['Sold_date'];?></th>
      </tr>
     

   <?php
}
      }
    
     
     else{
      echo "0 result";
     }
 ?>
</table>
</form>
         

                                        </div>
                                    </div>
                                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">                                    
                                    <center><a button data-toggle="collapse" data-target="#demo2"><h2 ><b><u>Store Status In <?php echo $Branch; ?></u></b></a></h2></a></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                <div class="card-content collapse" id="demo2">
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
  <?php } else  if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";   ?>

          <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">                                    
                                    <center><h2 ><b><u>All Transaction</u></b></a></h2></center>
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
                                                    <th>Item Id</th>
                                                    <th>Item Name </th>
                                                    <th>Unit </th>
                                                    <th>Quantity</th>
                                                    <th>Country</th>
                                                    <th>Sales Price</th>
                                                    <th>Sold By</th>
                                                    <th>Customer Name</th>
                                                    <th>Sold Date</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * from `sold_item` ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <?php echo $row['item_id'];?></th>   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Sales_price'];?></th>
        <th><?php echo $row['Sold_by'];?></th>
        <th><?php echo $row['Customer_name'];?></th>
        <th><?php echo $row['Sold_date'];?></th>
      </tr>
     

   <?php
}
      }
    
     
     else{
      echo "0 result";
     }
 ?>
</table>
</form>
         

                                        </div>
                                    </div>
                                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">                                    
                                    <center><h2 ><b><u>Store Status In <?php echo $Branch; ?></u></b></a></h2></center>
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