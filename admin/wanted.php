<?php
require_once('../assets/constants/config.php');

include('../header/SKheader.php');



?>

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Arrange Report</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Wanted item
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
                                    <div class="card-body">
                                         <form method="post" action="generaterep.php" name="frmUser" class="form-horizontal">
<div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Report Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="repid" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Title <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Prepared By <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="PreparedBy" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Telephone <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="telephone" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-6 col-md-12">

                                                    <div class="form-group">
                                                        <h5>Email Address <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="email" class="form-control mb-1" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                        <h5>content <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="content" class="form-control mb-1"  required placeholder="" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
  <div class="table-responsive">
      <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
      <tr>
        <th><input type="checkbox" id="checkAl"> All</th>
       
        <th>item id </th>
        <th>category name</th>
        <th>item name </th>
        <th>unit </th>
        <th>quantity</th>
        <th>item price</th>
        <th>expire date</th>
        <th>entered date</th>
        <th>supplier name</th>
        <th>record by</th>
      </tr>
      
    </thead>

<?php 

    $sqlr="SELECT `Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Item_price`, `sales_price`, `Country`, `Produced_Date`, `Expired_date`, `Entered_date`, `Shelf_no`, `supplier_name`, `Record_by`, `Status` FROM `item`";
     $result = $con->query($sqlr);
     $i=0;
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["item_id"]; ?>"> 
        <th><?php echo $row['item_id'];?></th>
        <th><?php echo $row['Catagory_name'];?></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Item_price'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Entered_date'];?></th>
        <th><?php echo $row['supplier_name'];?></th>
        <th><?php echo $row['Record_by'];?></th>
        
      </tr>
        
          <?php
          $i++;

      }
      echo "</table>";
     }
     else{
      echo "0 result";
     }
     $con->close();

 ?>

<p align="center"><button type="submit" class="btn btn-success" name="save" onclick="setUpdateAction()">generate report</button></p>
</table>
  </div>
 
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