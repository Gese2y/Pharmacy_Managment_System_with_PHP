 <?php
require_once('../assets/constants/config.php');

include('../header/SKheader.php');

?>

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Manage Item</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Update Item Info
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
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Control</th>
                                                    <th>item id</th>
                                                    <th>category name</th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>item price</th>
                                                    <th>sales price</th>
                                                    <th>country</th>
                                                    <th>manfuctured date</th>
                                                    <th>expire date</th>
                                                    <th>entered date</th>
                                                    <th>shelf no</th>
                                                    <th>supplier id</th>
                                                    <th>record by</th>
                                                    <th>status</th>
                                                     
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 
if ($Branch=='Mebrat Hayil Branch') {
    $SStore="Store 1";

     $sqlr="SELECT * FROM item WHERE store='Store 1'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th> <a href="update.php?id=<?php echo $row['no']; ?>"class="btn btn-success"><i class="las la-edit"></i>update</a></th>
        <th><?php echo $row['item_id'];?></th>
        <th><?php echo $row['Catagory_name'];?></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Item_price'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Produced_Date'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Entered_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['supplier_name'];?></th>
        <th><?php echo $row['Record_by'];?></th>
        <th><?php echo $row['Status'];?></th>
        
      </tr>
        
          <?php

      }
    
     }
     else{
      echo "0 result";
     }
     $con->close();
}
else if ($Branch=='Wollo Sefer Branch') {
    $SStore="Store 1";

     $sqlr="SELECT * FROM item WHERE store='Store 2'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><a href="update.php?id=<?php echo $row['no']; ?>"class="btn btn-success"><i class="las la-edit"></i>update</a></th>
        <th><?php echo $row['item_id'];?></th>
        <th><?php echo $row['Catagory_name'];?></th>
        <th><?php echo $row['Item_name'];?></th>
        <th><?php echo $row['unit'];?></th>
        <th><?php echo $row['Quantity'];?></th>
        <th><?php echo $row['Item_price'];?></th>
        <th><?php echo $row['sales_price'];?></th>
        <th><?php echo $row['Country'];?></th>
        <th><?php echo $row['Produced_Date'];?></th>
        <th><?php echo $row['Expired_date'];?></th>
        <th><?php echo $row['Entered_date'];?></th>
        <th><?php echo $row['Shelf_no'];?></th>
        <th><?php echo $row['supplier_name'];?></th>
        <th><?php echo $row['Record_by'];?></th>
        <th><?php echo $row['Status'];?></th>
        
      </tr>
        
          <?php

      }
    
     }
     else{
      echo "0 result";
     }
     $con->close();
}
else
{


} ?>
</table>
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
    $(document).ready(function(){

    $('.cancel-button').on('click',function(){        
        swal({
            title: "Are you sure?",
            text: "To Delete This Record!",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                },
                confirm: {
                    text: "Delete",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        })
        .then((isConfirm) => {
            if (isConfirm) {
                var id=this.id;
            $.ajax({
              url: "app/suppliers?id="+id,
              type: "GET",
              success: function(inputValue){
                swal("Deleted!", "Your Record has been deleted.", "success");
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
                }
            });
                
            } else {
                swal("Cancelled", "Your Record is safe", "error");
            }
        });

    });   

});
</script>