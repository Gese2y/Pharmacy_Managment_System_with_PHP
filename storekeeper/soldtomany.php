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
                                <li class="breadcrumb-item active">Sold To Many
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
                                    <center><h2 ><b><u>Sold To Many</u></b></a></h2></center>
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
                                                     <th>Total</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as SameValue from `sold_item` WHERE Sold_date BETWEEN '$d1' AND '$d2' GROUP BY item_id having sum(Quantity) > 10";
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
        <th><?php echo "totaly". $row['SameValue']." " .$row['Item_name']. "solds from 2020-19-19"; ?><a href="soldtomany.php?id=<?php echo $row['item_id']; ?>"> view</a></th>
      </tr>
     

  
</table>
<p align="center"><button type="submit" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" name="save" onclick="return checkDelete()" >Delete Selected Item</button></p>
</form>
          <?php
}
      }
    
     
     else{
      echo "0 result";
     }
     $con->close();
}
 ?>

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