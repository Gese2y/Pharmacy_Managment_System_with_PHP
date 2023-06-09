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
                                <li class="breadcrumb-item active">Low Item Quantity
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
                                    <h4 class="card-title"><a href="addsupplier" class="btn btn-primary "><i class="la la-plus"></i>Add New</a></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap"><input type="checkbox" id="checkAl"> Select All Entry  
                                        <div class="table-responsive">
                                              <form method="post" action="">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Control</th>
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

     $sqlr="SELECT `Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Item_price`, `sales_price`, `Country`, `Produced_Date`, `Expired_date`, `Entered_date`, `Shelf_no`, `supplier_name`, `Record_by`, `Status` FROM `item` WHERE `Quantity`=0";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["item_id"]; ?>"> <a href=""class="btn btn-info" ><i class="la la-view"></i> View Detail</a></th>
   
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

 ?>
</table>
<p align="center"><button type="submit" class="btn btn-icon btn-primary mr-1 mb-1 cancel-button" name="save" onclick="return checkDelete()" >Generate Report</button></p>
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