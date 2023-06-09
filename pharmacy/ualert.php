<?php
require_once('../assets/constants/config.php');

include('../header/PHheader.php');



?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
</style>
<style type="text/css">
     .main {
       
        margin: 0em auto;
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Alert</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Unavialable Item Alert
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
</a>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">    
                                        <div class="">
                                            <table class="">
                                                 <thead>
          
                                                  <tr>
                                                    
                                                    <th>Alert No</th>
                                                    <th>Title</th>
                                                    <th>Content </th>
                                                    <th>Alert Date </th>
                                                    <th>Status</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 

     $sqlr="SELECT * FROM `alert2` where alert_title='unavilable_item' and status not like '%$Gname%' order by alert_date desc ";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><?php echo $row['alert_no'];?></th>
        <th><?php echo $row['alert_title'];?></th>
        <th><?php echo $row['content'];?></th>
        <th><?php echo $row['alert_date'];?></th>
        <th><a href="Up_alert.php?id=<?php echo $row['alert_no']; ?>"class="btn btn-primary"><i ></i><?php echo $row['status'];?></a><a href="<?php echo $row['alert_title']; ?>"class="btn btn-success"><i ></i>view detail</a></th>
        
      </tr>
          <?php

      }
    
     }
     else{
      echo "0 result";
     }

 ?>
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
    <!-- END: Content-->
<?php


?>
    <?php include 'footer.php'; ?>