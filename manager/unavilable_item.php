 <?php
require_once('../assets/constants/config.php');

include('../header/MAheader.php');

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
                                <li class="breadcrumb-item active">Low Item
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
                                    <center><h2 ><b><u>Low Item</u></b></a></h2></center>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>

   
  <center> <a button data-toggle="collapse" data-target="#demo1" ><h2 ><b><u>Low Item In Wollo Sefer</u></b></h2></a> </center>
                                   
                <div class="card-content collapse show" id="demo1">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          

  <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Control</th>
                                                    <th>Category Id</th>
                                                    <th>Item Id</th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>shelf Number</th>
                                                    <th>Status</th>
                                                     
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 

     $sqlr="SELECT * FROM `itemdetail2` WHERE Quantity=0";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["item_id"]; ?>"> <a href=""class="btn btn-info" ><i class="la la-view"></i> View Detail</a></th>
        <th><?php echo $row['Category_id'];?></th>
        <th><?php echo $row['item_id'];?></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['Status'];?></th>
        
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
                                    </div></div>
                              <center> <a button data-toggle="collapse" data-target="#demo3" ><h2 ><b><u>Unavialable Item in Mebrat Hayil</u></b></h2></a> </center>
                                    
                <div class="card-content collapse" id="demo3">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"> 
                                        <div class="table-responsive">
                                          
  <center>
                                      
                                          </center>

  <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Control</th>
                                                    <th>Category Id</th>
                                                    <th>Item Id</th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>shelf Number</th>
                                                    <th>Status</th>
                                                     
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 

     $sqlr="SELECT * FROM `itemdetail` WHERE Quantity=0";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["item_id"]; ?>"> <a href=""class="btn btn-info" ><i class="la la-view"></i> View Detail</a></th>
        <th><?php echo $row['Category_id'];?></th>
        <th><?php echo $row['item_id'];?></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['Status'];?></th>
        
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