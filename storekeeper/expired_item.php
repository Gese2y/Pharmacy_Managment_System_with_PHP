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
                    <h3 class="content-header-title">View Store Status</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Expired Item
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
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Control</th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>country</th>
                                                    <th>manfuctured date</th>
                                                    <th>expire date</th>
                                                    <th>entered date</th>
                                                    <th>Shelf No</th>
                                                    <th>status</th>
                                                    <th>Store</th>
                                                     
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php
if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1"; 

     $sqlr="SELECT * FROM `item` WHERE store='Store 1' AND Status='Item Expired'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <a href="update.php?id=<?php echo $row['item_id']; ?>&C=<?php echo $row['Country'];?>&ED=<?php echo $row['Entered_date'];?>&ST=<?php echo $row['store'];?>"class="btn btn-success"><i class="las la-edit"></i></a><a href="delete.php?id=<?php echo $row['item_id']; ?>&C=<?php echo $row['Country'];?>&ED=<?php echo $row['Entered_date'];?>&ST=<?php echo $row['store'];?>&Q=<?php echo $row['Quantity'];?>"class="btn btn-danger" onclick="return checkDelete()"><i class="la la-trash"></i></a></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Produced_Date'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Entered_date'];?></th>
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
}
if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 1"; 

     $sqlr="SELECT * FROM `item` WHERE store='Store 2' AND Status='Item Expired'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><a href="update.php?id=<?php echo $row['item_id']; ?>&C=<?php echo $row['Country'];?>&ED=<?php echo $row['Entered_date'];?>&ST=<?php echo $row['store'];?>"class="btn btn-success"><i class="las la-edit"></i></a> <a href="delete.php?id=<?php echo $row['item_id']; ?>&C=<?php echo $row['Country'];?>&ED=<?php echo $row['Entered_date'];?>&ST=<?php echo $row['store'];?>&Q=<?php echo $row['Quantity'];?>"class="btn btn-danger" onclick="return checkDelete()"><i class="la la-trash"></i></a></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Produced_Date'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Entered_date'];?></th>
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