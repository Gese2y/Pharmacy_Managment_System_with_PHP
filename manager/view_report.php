<?php
require_once('../assets/constants/config.php');

include('../header/MAheader.php');




  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='manager')";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) { 




?>
<style type="text/css">
     .main {
       
        margin: 0em auto;
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">View Report</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">View Report
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
                                    	<center><h2 ><b><u>Sent Report</u></b></a></h2></center>
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
                                                    
                                                    <th>Report id</th>
                                                    <th>Title</th>
                                                    <th>Sent Fropm </th>
                                                    <th>Telephone </th>
                                                    <th>Email Address</th>
                                                    <th>Sent Date</th>
                                                    <th>Document</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 

     $sqlr="SELECT `report_id`, `Title`, `prepare_by`, `contact`, `email`, `sent_date`, `content`, `document` FROM `report`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><?php echo $row['report_id'];?></th>
        <th><?php echo $row['Title'];?></th>
        <th><?php echo $row['prepare_by'];?></th>
        <th><?php echo $row['contact'];?></th>
        <th><?php echo $row['email'];?></th>
        <th><?php echo $row['sent_date'];?></th>
        <th><?php echo $row['document'];?> <a target="_blank" rel="noopener noreferrer" href="pdf.php?id=<?php echo $row['report_id']; ?>" class="btn btn-link">View Document</a></th>
        
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
  }
  else{
    echo "<h1 style='color:red'>".$nameUs1." you are not granted to record item <h1>";
    echo "<a href='logout.php' class='w3-bar-item w3-button' id='topNavLogout'><i class='glyphicon glyphicon-log-out'></i>Login with another user</a>";
  }

?>
    <?php include 'footer.php'; ?>