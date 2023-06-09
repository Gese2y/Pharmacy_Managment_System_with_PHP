<?php
require_once('../assets/constants/config.php');

include('../header/MAheader.php');
if(isset($_POST['save'])){
  $checkbox = $_POST['check'];
  for($i=0;$i<count($checkbox);$i++){
  $del_id = $checkbox[$i]; 
  mysqli_query($con,"DELETE FROM item WHERE item_id='".$del_id."'");
  $message = "Data deleted successfully !";
}
}

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
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">View Transaction Status</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">View Transaction Status
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="value">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">  
<div class="collapse show" id="store">
  <div class="row" style="margin: 1em auto;">

            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as SameValue from `sold_item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Transaction Status</i></b></h2></center>

                    <h3 class="text-white">Over All Transaction In The Pharmay</h3>
                  </div>
                  <h3 class="card-title text-white">There Are <?php echo $row['SameValue']; ?> item solds Over All transaction  in both branch 
                  </h3>
                <?php }}                 ?>
                <table id="customers">
                  <tr>
                    <td>Wollo Sefer Branch</td>
                    <td>Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <?php 
$sqlS1="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as S2Value from `sold_item` where from_store='Store 2'  GROUP BY item_id";
     $resultS1 = $con->query($sqlS1);
     if ($resultS1 ->num_rows > 0) {
      while ($row1 = $resultS1->fetch_array()) { ?>
                    <td><?php echo $row1['S2Value'];?></td><?php }}?>
<?php 
$sqlS2="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as S1Value from `sold_item` where from_store=0";
     $resultS2 = $con->query($sqlS2);
     if ($resultS2 ->num_rows > 0) {
      while ($row2 = $resultS2->fetch_array()) { ?>
                    <td><?php echo $row2['S1Value'];?></td><?php }}?>
                  </tr>
                </table>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="vieTraStat">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-danger">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $NoPr="SELECT item_id, sum(Quantity) as QTot from sold_item where Quantity>=10  and YEAR(Sold_date)=2020";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);

$Cou="SELECT item_id, count(item_id) as cTot from sold_item where Quantity>=10  and YEAR(Sold_date)=2020";
$cour=mysqli_query($con,$Cou);
$rocou=mysqli_fetch_array($cour);?>

                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Transaction Status: Sold to many Item</i></b></h2></center>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i> </span> <span class="text-primary"> <?php echo $rocou['cTot']; ?> </span> sold, totally.<span class="text-primary"> <?php echo $roNoPr['QTot']; ?></span> item Sold in both branch      
                  </h3></div>
                <?php  ?>
                 <a button data-toggle="collapse" data-target="#store1" class="text-primary">view </a>Top 5
                 <div class="collapse" id="store1">
  <table id="customers">
                  <tr>
                    <td colspan="3">Wollo Sefer Branch</td>
                    <td colspan="3">Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <?php 

$all="SELECT item_id, sum(Quantity) as aTot from sold_item where from_store='Store 2' and Quantity>=10 and YEAR(Sold_date)=2020";
$resall=mysqli_query($con,$all);
$rowall=mysqli_fetch_array($resall);
$allc="SELECT item_id, count(item_id) as acTot from sold_item where from_store='Store 2' and Quantity>=10 and YEAR(Sold_date)=2020";
$resallc=mysqli_query($con,$allc);
$rowallc=mysqli_fetch_array($resallc);
        ?>
                    <td colspan="3"><?php echo $rowallc['acTot']; ?> item: Total = <?php echo $rowall['aTot'];?></td><?php ?>
                    <?php 
$all="SELECT item_id, sum(Quantity) as aTot from sold_item where from_store='Store 1' and Quantity>=10 and YEAR(Sold_date)=2020";
$resall=mysqli_query($con,$all);
$rowall=mysqli_fetch_array($resall);
$allc="SELECT item_id, count(item_id) as acTot from sold_item where from_store='Store 1' and Quantity>=10 and YEAR(Sold_date)=2020";
$resallc=mysqli_query($con,$allc);
$rowallc=mysqli_fetch_array($resallc);
        ?>
                    <td colspan="3"><?php echo $rowallc['acTot']; ?> item: Total = <?php echo $rowall['aTot'];?></td><?php ?>
                  </tr>
 
                    <tr><td>Item Id</td><td>Item name</td><td>Total</td>
                  <td>Item Id</td><td>Item name</td><td>Total</td></tr>
<tr>
  <?php $NoPr="SELECT item_id,Item_name, sum(Quantity) as QTot from sold_item where from_store='Store 2' and Quantity>=10 group by item_id order by Quantity Desc limit 5";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);
$NoPr1="SELECT item_id,Item_name, sum(Quantity) as QTot from sold_item where from_store='Store 1' and Quantity>=10 group by item_id order by Quantity Desc limit 5";
$resNoPr1=mysqli_query($con,$NoPr1);
$roNoPr1=mysqli_fetch_array($resNoPr1); ?>
<td><?php echo $roNoPr['item_id']; ?></td>
              <td><?php echo $roNoPr['Item_name']; ?></td>
            <td><?php echo  $roNoPr['QTot']; ?></td>
            <td><?php echo $roNoPr1['item_id']; ?></td>
              <td><?php echo $roNoPr1['Item_name']; ?></td>
            <td><?php echo  $roNoPr1['QTot']; ?></td>
</tr>


                </table> </div>
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
                  <?php $sqlr="SELECT `item_id`,Sold_by,Sales_price, Sum(Quantity) as phar from `sold_item` where from_store='Store 2' group by Sold_by order by Quantity Desc limit 3";
                  $ph=mysqli_query($con,$sqlr);
                  $phr=mysqli_fetch_array($ph);
                  $sqlr1="SELECT `item_id`,Sold_by,Sales_price, Sum(Quantity) as phar1 from `sold_item` where from_store='Store 1' group by Sold_by order by Quantity Desc limit 3";
                  $ph1=mysqli_query($con,$sqlr1);
                  $phr1=mysqli_fetch_array($ph1);
                  
                  ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Pharmasist Sales Many </i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># pharmacist who sales many 
                  </h3>                  
                <?php  ?>
  <table id="customers">
                  <tr>
                    <td colspan="3">Wollo Sefer Branch</td>
                    <td colspan="3">Mebrat Hayil Branch</td>
                  </tr>
                  <tr>
                    <td>Name</td><td>solds</td><td>profit</td><td>Name</td><td>solds</td><td>profit</td>
                  </tr>
                  <tr>
                    <td><?php echo $phr['Sold_by']; ?></td><td><?php echo $phr['phar']; ?></td><td><?php echo $phr['Sales_price']; ?></td>
                    <td><?php echo $phr1['Sold_by']; ?></td><td><?php echo $phr1['phar1']; ?></td><td><?php echo $phr1['Sales_price']; ?></td>
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
          </div>
</div>
          
  <center> <a button data-toggle="collapse" data-target="#demo1" ><h2 ><b><u>All Transaction In Wollo Sefer</u></b></h2></a> </center>
                                   
                <div class="card-content collapse show" id="demo1">
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
$sqlr="SELECT * from `sold_item` where from_store='Store 2' ";
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
                                    </div></div>
                              <center> <a button data-toggle="collapse" data-target="#demo3" ><h2 ><b><u>All Transaction In Mebrat Hayil</u></b></h2></a> </center>
                                    
                <div class="card-content collapse" id="demo3">
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
$sqlr="SELECT * from `sold_item` where from_store='Store 1' ";
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
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php include 'footer.php'; ?>

<script>
    function checkDelete() {
      return confirm('are you sure delete user data','#E74C3C');
    }
  </script>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>