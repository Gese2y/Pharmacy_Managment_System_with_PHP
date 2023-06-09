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
                                <li class="breadcrumb-item active">Never Sold Item
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
                                    <center><h2 ><b><u>Never Sold</u></b></a></h2></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
     <center>
                                              <form action="" method="POST">From: <input  type="date" placeholder="search by user name" name="d1"> To: <input  type="date" placeholder="search by user name" name="d2">
      <button type="submit" name="search" class="btn btn-primary">Open It</button>
  </form>
                                          </center>
  <?php


if (isset($_POST['search'])) {
  $d1=$_POST['d1'];
  $d2=$_POST['d2'];?>      
  <center> <a button data-toggle="collapse" data-target="#demo1" ><h2 ><b><u>Sold To Many In Wollo Sefer</u></b></h2></a> </center>
                                   
                <div class="card-content collapse show" id="demo1">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">

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
                                                    <th>Shelf No</th>
                                                     <th>Status</th>
                                                     <th>Store</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * FROM item WHERE NOT EXISTS (SELECT * FROM sold_item WHERE sold_item.item_id = item.item_id and Sold_date BETWEEN '$d1' AND '$d2' ) and store='Store 2' ORDER BY no ASC "; 
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
                                    </div></div>
                              <center> <a button data-toggle="collapse" data-target="#demo3" ><h2 ><b><u>Soldf To Many In Mebrat Hayil</u></b></h2></a> </center>
                                    
                <div class="card-content collapse" id="demo3">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
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
                                                    <th>Customer Name</th>
                                                    <th>Shelf No</th>
                                                     <th>Status</th>
                                                     <th>Store</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
$sqlr="SELECT * FROM item WHERE NOT EXISTS (SELECT * FROM sold_item WHERE sold_item.item_id = item.item_id and Sold_date BETWEEN '$d1' AND '$d2' ) and store='Store 1' ORDER BY no ASC "; 
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
     }}
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