<?php
require_once('../assets/constants/config.php');

include('../header/SKheader.php');

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
                                <li class="breadcrumb-item active">Avialabled Item
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
                                                    <th><a button data-toggle="collapse" data-target="#demo1" class="btn btn-info">View other</a> </th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>Item Price</th>
                                                    <th>Sales Price</th>
                                                    <th>expire date</th>
                                                    <th>shelf Number</th>
                                                     
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1"; 
     $sqlr="SELECT * FROM `item` WHERE `Status`='Avialable' AND store='Store 1'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      $Itid=$row['item_id'];
        $sql="SELECT * FROM `itemdetail2` WHERE item_id='$Itid' ";
        $res=mysqli_query($con,$sql);
        $ro1=mysqli_fetch_array($res);
      ?>
      <tr>
        <th>
          <div class="card-content collapse" id="demo1">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <img src="image/<?php echo $ro1['image']; ?> " alt="image" style="width: 50px; height: 50px">
              </div></div>
            </div>
            <h4 style="color: red; text-align: center">Side Effect</h4>
              <p> <?php echo $ro1['side_effect']; ?></p>
              <h4 style="color: green; text-align: center">Description</h4>
              <p> <?php echo $ro1['Description']; ?></p>
          </div>
          </th>
   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Item_price'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        
      </tr>
        
          <?php

      }
    
     }
     else{
      echo "0 result";
     }
     $con->close();
}else if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 1"; 
     $sqlr="SELECT * FROM `item` WHERE `Status`='Avialable' AND store='Store 2'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      $Itid=$row['item_id'];
        $sql="SELECT * FROM `itemdetail2` WHERE item_id='$Itid' ";
        $res=mysqli_query($con,$sql);
        $ro1=mysqli_fetch_array($res);
      ?>
      <tr>
        <th>
          <div class="card-content collapse" id="demo1">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <img src="image/<?php echo $ro1['image']; ?> " alt="image" style="width: 50px; height: 50px">
              </div></div>
            </div>
            <h4 style="color: red; text-align: center">Side Effect</h4>
              <p> <?php echo $ro1['side_effect']; ?></p>
              <h4 style="color: green; text-align: center">Description</h4>
              <p> <?php echo $ro1['Description']; ?></p>
          </div>
          </th>
   
   
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Item_price'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        
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