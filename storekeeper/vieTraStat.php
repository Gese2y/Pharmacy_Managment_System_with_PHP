<?php
require_once('../assets/constants/config.php');

include('../header/SKheader.php');
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
       <div class="container-fluid">
          <?php 
          
 if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 2";  ?>
          <div class="row" style="margin: 1em auto;">
            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php
                  $y=date('year'); $sqlr="SELECT `item_id`, `Quantity`,Item_name,Sold_date,YEAR(Sold_date), Sum(Quantity) as SameValue from `sold_item` where from_store='$SStore' AND YEAR(Sold_date)='$y'";
                  $result=mysqli_query($con,$sqlr);
                  $rowr=mysqli_fetch_array($result);

                   
$NoI="SELECT item_id,YEAR(Sold_date), count(item_id) as NoOfitem from sold_item where from_store='$SStore' and YEAR(Sold_date)=2020 ";
$resNoI=mysqli_query($con,$NoI);
$roNoI=mysqli_fetch_array($resNoI);

$NoPr="SELECT item_id, sum(Sales_price) as Profit from sold_item where from_store='$SStore'";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);

$NoC="SELECT item_id, sum(Sales_price) as Cu from sold_item where from_store='$SStore'";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);


                  ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Transaction status in <?php echo $Branch; ?></i></b></h2></center>

                    <h3 class="text-white">There are <?php echo $roNoI['NoOfitem'];  ?> item solds, and Totally  <?php echo $rowr['SameValue'];  ?> solds In this year</h3>
                  </div>
                  <h3 class="card-title text-white">Totally We can get <span class="text-dark"><?php echo $roNoPr['Profit']; ?><i class="fa fa-long-arrow-up"></i></span>  Birr item solds in <?php echo $Branch; ?>                  </h3>

                <?php  ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $NoPr="SELECT item_id, sum(Quantity) as QTot from sold_item where from_store='$SStore' and Quantity>=10 group by item_id order by Quantity Desc limit 5";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Mostlly Sold Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $roNoPr['QTot']; ?></span> item mostlly solds   
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#store" class="text-primary">view </a>Top 5 item that are mostlly solds<br>
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
                  <?php $NoPr="SELECT item_id,Item_name, sum(Quantity) as QTot from sold_item where from_store='$SStore' and Quantity<10 group by item_id order by Quantity ASC limit 5";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);

$NoI="SELECT item_id, count(item_id) as Noitem from sold_item where from_store='$SStore' and  Quantity<=10 ";
$resNoI=mysqli_query($con,$NoI);
$roNoI=mysqli_fetch_array($resNoI);
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Leastlly Sold Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning"><i class="fa fa-long-arrow-up"></i> <?php echo $roNoI['Noitem']; ?></span> different AND Totally<span class="text-warning"> <?php echo $roNoPr['QTot']; ?></span> item mostlly solds   
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#Least" class="text-warning">view </a>Top 5 item that are leastlly solds<br>
<div class="collapse" id="Least"></b></p>
                  <table id="customers">
                    <tr><td>Item Id</td><td>Item Name</td>
            <td>Total</td></tr>
          <?php  $result = mysqli_query($con,$NoPr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
          
            <tr><td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
            <td><?php echo  $row['QTot']; ?></td></tr>
            <?php }} ?>
        </table></div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="text-white">Get More Information</a>
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
                  <?php $sqlr="SELECT `item_id`, `Quantity`,Item_name, Sum(Quantity) as SameValue from `sold_item` where from_store='$SStore'";
                  $result=mysqli_query($con,$sqlr);
                  $rowr=mysqli_fetch_array($result);

                   
$NoI="SELECT item_id, count(item_id) as NoOfitem from sold_item where from_store='$SStore' ";
$resNoI=mysqli_query($con,$NoI);
$roNoI=mysqli_fetch_array($resNoI);

$NoPr="SELECT item_id, sum(Sales_price) as Profit from sold_item where from_store='$SStore'";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);

$NoC="SELECT item_id, sum(Sales_price) as Cu from sold_item where from_store='$SStore'";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);


                  ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Transaction status in <?php echo $Branch; ?></i></b></h2></center>

                    <h3 class="text-white">There are <?php echo $roNoI['NoOfitem'];  ?> item solds, and Totally  <?php echo $rowr['SameValue'];  ?> solds In this year</h3>
                  </div>
                  <h3 class="card-title text-white">Totally We can get <span class="text-dark"><?php echo $roNoPr['Profit']; ?><i class="fa fa-long-arrow-up"></i></span>  Birr item solds in <?php echo $Branch; ?>                  </h3>

                <?php  ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $NoPr="SELECT item_id, sum(Quantity) as QTot from sold_item where from_store='$SStore' and Quantity>=10 group by item_id order by Quantity Desc limit 5";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Mostlly Sold Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $roNoPr['QTot']; ?></span> item mostlly solds   
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#store" class="text-primary">view </a>Top 5 item that are mostlly solds<br>
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
                    <a href="soldtomany" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-primary">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $NoPr="SELECT item_id,Item_name, sum(Quantity) as QTot from sold_item where from_store='$SStore' and Quantity<10 group by item_id order by Quantity ASC limit 5";
$resNoPr=mysqli_query($con,$NoPr);
$roNoPr=mysqli_fetch_array($resNoPr);

$NoI="SELECT item_id, count(item_id) as Noitem from sold_item where from_store='$SStore' and  Quantity<=10 ";
$resNoI=mysqli_query($con,$NoI);
$roNoI=mysqli_fetch_array($resNoI);
        ?>
       
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Leastlly Sold Item In <?php echo $Branch; ?></i></b></h2></center>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-warning"><i class="fa fa-long-arrow-up"></i> <?php echo $roNoI['Noitem']; ?></span> different AND Totally<span class="text-warning"> <?php echo $roNoPr['QTot']; ?></span> item mostlly solds   
                  </h3><center><p><b><a button data-toggle="collapse" data-target="#Least" class="text-warning">view </a></b> Top 5 item that are mostlly solds</p><br>
<div class="collapse" id="Least">
                  <table id="customers">
                    <tr><td>Item Id</td><td>Item Name</td>
            <td>Total</td></tr>
          <?php  $result = mysqli_query($con,$NoPr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
          
            <tr><td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['Item_name']; ?></td>
            <td><?php echo  $row['QTot']; ?></td></tr>
            <?php }} ?>
        </table>
      </div>
    </center>
                <div class="card-footer">
                  <div class="stats">
                    <a href="slightly" class="text-white">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>               
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
<center><h1 style="color: green"><b><u>All Transaction Satus In <?php echo $Branch; ?></u> </b></h1></center>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          <center>
                                              <form action="" method="POST">From: <input  type="date" placeholder="search by user name" name="d1"> To: <input  type="date" placeholder="search by user name" name="d2">
      <button type="submit" name="search" class="btn btn-primary">Open It</button>
  </form>
                                          </center>
  <?php


if (isset($_POST['search'])) {
  $d1=$_POST['d1'];
  $d2=$_POST['d2'];?>
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th><input type="checkbox" id="checkAl"></th>
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
$sqlr="SELECT * from `sold_item` WHERE Sold_date BETWEEN '$d1' AND '$d2' and from_store='$SStore' ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["item_id"]; ?>"></th>
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
}
 ?>
</table>

</form>

         

                                        </div>
                                    </div>
<center><button class="btn btn-primary"  button data-toggle="collapse" data-target="#Least2">Close It</button></center>
<div class="collapse show" id="Least2">
  <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
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
$sqlr="SELECT * from `sold_item` where from_store='$SStore' ";
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