<?php
require_once('../assets/constants/config.php');

include('../header/PHheader.php');




  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='Pharmacist')";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) { 


                             



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
                    <h3 class="content-header-title">Request</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">View Request
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
                                    	<a class="btn btn-primary" href="request">Send
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
                                                    
                                                    <th>Request No</th>
                                                    <th>Title</th>
                                                    <th>Sent From </th>
                                                    <th>Telephone </th>
                                                    <th>Email Address</th>
                                                    <th>Sent Date</th>
                                                    <th>Content</th>
                                                    <th>Status</th>
                                                  </tr>
                                                 
                                                        
                                                       
                                                   
                                                  
                                                </thead>

<?php 

     $sqlr="SELECT * FROM `request` WHERE sent_to='pharmacy' or sent_to='pharmacist'";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) {
      ?>
      <tr>
        <th><?php echo $row['request_id'];?></th>
        <th><?php echo $row['title'];?></th>
        <th><?php echo $row['sender_role'];?>: <?php echo $row['sent_from'];?></th>
        <th><?php echo $row['contact'];?></th>
        <th><?php echo $row['email'];?></th>
        <th><?php echo $row['sent_date'];?></th>
        
        <th><?php echo $row['content'];?>
          <th> <a href="Up_request.php?id=<?php echo $row['request_id']; ?>"class="btn btn-primary"><i ></i><?php echo $row['status'];?></a></th></th>
        
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