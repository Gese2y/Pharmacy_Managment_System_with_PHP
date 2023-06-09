<?php
require_once('../assets/constants/config.php');

include('header.php');
 $sqlr="SELECT item_id, Catagory_id, Item_name,unit,Quantity, Item_price,Country,Produced_Date,Expired_date,Entered_date,Shelf_no,Supplier_id,Record_by,Status FROM item";
     $result = $con->query($sqlr);
      $result->fetch_array();

?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Suppliers</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Suppliers
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
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">                                        
                                        <?php require_once('../assets/constants/check-reply.php') ;?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
          
                                                  <tr>
                                                    <th>Citem id </th>
                                                    <th>category id</th>
                                                    <th>item name </th>
                                                    <th>unit </th>
                                                    <th>quantity</th>
                                                    <th>item price</th>
                                                    <th>country</th>
                                                    <th>manfuctured date</th>
                                                    <th>expire date</th>
                                                    <th>entered date</th>
                                                    <th>shelf no</th>
                                                    <th>supplier id</th>
                                                    <th>record by</th>
                                                    <th>status</th>
                                                     <th>Control</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>


    
      <tr>
        <?php 
                                                    $i=1;
                                                    foreach ($result as $value) { ?>
        <th><?php echo $value['item_id'];?></th>
        <th><?php echo $value['Catagory_id'];?></th>
        <th><?php echo $value['Item_name'];?></th>
        <th><?php echo $value['unit'];?></th>
        <th><?php echo $value['Quantity'];?></th>
        <th><?php echo $value['Item_price'];?></th>
        <th><?php echo $value['Country'];?></th>
        <th><?php echo $value['Produced_Date'];?></th>
        <th><?php echo $value['Expired_date'];?></th>
        <th><?php echo $value['Entered_date'];?></th>
        <th><?php echo $value['Shelf_no'];?></th>
        <th><?php echo $value['Supplier_id'];?></th>
        <th><?php echo $value['Record_by'];?></th>
        <th><?php echo $value['Status'];?></th>
        <th> <a title="Edit" href="editsupplier?id=<?php echo $value['item_id']; ?>" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                                                            <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" id="<?=$value['id']?>"><i class="la la-trash"></i></button></th>
      </tr>
        
<?php $i++; } ?>
                                                
                                               
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