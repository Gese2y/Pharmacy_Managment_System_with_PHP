 <?php
require_once('../assets/constants/config.php');
include('../header/MAheader.php');
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
<br><br>
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">
<div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>   
<div class="collapse show" id="store">
  <div class="row" style="margin: 1em auto;">

            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      $count="SELECT item_id, count(item_id) as No from item";
      $countRes=mysqli_query($con,$count);
      $RowC=mysqli_fetch_array($countRes); ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status</i></b></h2></center>
                    <h3 class="text-white">Over All Item found in the pharmacy store</h3>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i><?php echo $RowC['No']; ?></span> item found in, and Totally there are <span class="text-primary"> <?php echo $row['SameValue']; ?></span> item Found in both store  
                  </h3>
                <?php }} ?>
  <table id="customers">
                  <tr>
                    <td>Wollo Sefer Branch</td>
                    <td>Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <?php 
$sqlS1="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `itemdetail2`";
     $resultS1 = $con->query($sqlS1);
     if ($resultS1 ->num_rows > 0) {
      while ($row1 = $resultS1->fetch_array()) { 
$countITD2="SELECT item_id, count(item_id) as No from item where store='Store 2'";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes);
        ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row1['SameValue'];?></td><?php }}?>
<?php 
$sqlS2="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `itemdetail`";
     $resultS2 = $con->query($sqlS2);
     if ($resultS2 ->num_rows > 0) {
      while ($row2 = $resultS2->fetch_array()) {
      $countITD2="SELECT item_id, count(item_id) as No from item where store='Store 1'";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes); ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row2['SameValue'];?></td><?php }}?>
                  </tr>
                </table>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-danger">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item` where Quantity>100";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      $count="SELECT item_id, count(item_id) as No from item where Quantity>100";
      $countRes=mysqli_query($con,$count);
      $RowC=mysqli_fetch_array($countRes); ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status: Avialabled Item</i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i><?php echo $RowC['No']; ?></span> avialble item found in, and Totally <span class="text-primary"> <?php echo $row['SameValue']; ?></span> item Avialabled in both store  
                  </h3>
                <?php }} ?>
  <table id="customers">
                  <tr>
                    <td>Wollo Sefer Branch</td>
                    <td>Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <?php 
$sqlS1="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `item` where Quantity>100 and store='Store 2'";
     $resultS1 = $con->query($sqlS1);
     if ($resultS1 ->num_rows > 0) {
      while ($row1 = $resultS1->fetch_array()) { 
$countITD2="SELECT item_id, count(item_id) as No from item where store='Store 2' and Quantity>100";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes);
        ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row1['SameValue'];?></td><?php }}?>
<?php 
$sqlS2="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `item` where Quantity>100 and store='Store 1'";
     $resultS2 = $con->query($sqlS2);
     if ($resultS2 ->num_rows > 0) {
      while ($row2 = $resultS2->fetch_array()) {
      $countITD2="SELECT item_id, count(item_id) as No from item where store='Store 1' and Quantity>100";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes); ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row2['SameValue'];?></td><?php }}?>
                  </tr>
                </table>
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
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item` where Quantity<100";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      $count="SELECT item_id, count(item_id) as No from item where Quantity<100";
      $countRes=mysqli_query($con,$count);
      $RowC=mysqli_fetch_array($countRes); ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status: Low Item</i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning"><i class="fa fa-long-arrow-up"></i><?php echo $RowC['No']; ?></span> avialble item found in, and Totally there <span class="text-warning"> <?php echo $row['SameValue']; ?></span> low item in both store  
                  </h3>
                <?php }} ?>
  <table id="customers">
                  <tr>
                    <td>Wollo Sefer Branch</td>
                    <td>Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <?php 
$sqlS1="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `item` where Quantity<100 and store='Store 2'";
     $resultS1 = $con->query($sqlS1);
     if ($resultS1 ->num_rows > 0) {
      while ($row1 = $resultS1->fetch_array()) { 
$countITD2="SELECT item_id, count(item_id) as No from item where store='Store 2' and Quantity<100";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes);
        ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row1['SameValue'];?></td><?php }}?>
<?php 
$sqlS2="SELECT `item_id`, `Quantity`, Sum(Quantity) as SameValue from `item` where Quantity<100 and store='Store 1'";
     $resultS2 = $con->query($sqlS2);
     if ($resultS2 ->num_rows > 0) {
      while ($row2 = $resultS2->fetch_array()) {
      $countITD2="SELECT item_id, count(item_id) as No from item where store='Store 1' and Quantity<100";
$countRes=mysqli_query($con,$countITD2);
      $RowC=mysqli_fetch_array($countRes); ?>
                    <td><?php echo $RowC['No']; ?> item: Total = <?php echo $row2['SameValue'];?></td><?php }}?>
                  </tr>
                </table>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="low_item" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
</div></div></div>

          <div class="row">
            
            <div class=" col-md-12">
              <div class="card">
                <div class="card-header">                                    
                                    <center><a button data-toggle="collapse" data-target="#demo2"><h2 ><b><u>Store Status In Wollo sefer</u></b></a></h2></a></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                <div class="card-content collapse show" id="demo2">
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
$sqlr="SELECT * from `item` where store='Store 2' ";
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

 ?>
</table>
</form>
         

                                        </div>
                                    </div>
                                </div>
             
 

            
                                               
                                    <center><a button data-toggle="collapse" data-target="#demo4"><h2 ><b><u>Store Status In Mebrat Hayil</u></b></a></h2></a></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                   
                <div class="card-content collapse" id="demo4">
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
$sqlr="SELECT * from `item` where store='Store 1' ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        
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
              </div>
            </div>
          </div>
        <?php ?>
        </div>
      </div>
     
    </div>
  </div>
<?php include 'footer.php'; ?>