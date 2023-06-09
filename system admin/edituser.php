<?php
require_once('../assets/constants/config.php');

include('../header/SAheader.php');


if (isset($_POST['search'])) {
  $checkun=$_POST['id'];

  $query6="SELECT * FROM user WHERE username='$checkun'";
  $result6_run=mysqli_query($con,$query6);
  if (mysqli_num_rows($result6_run)==1) {
    
  }else{
    $errors[]="user name does not exist";
  }

}


  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='system admin')";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) { 


if (isset($_POST['Update'])) {
$username=$_POST['username'];
  $password=$_POST['password'];
  $incryptedpas=md5($password);
  $E_id=$_POST['E_id'];
  $email=$_POST['email'];
  $res=$_POST['role'];
  echo $username;
  $sqlup="UPDATE user SET username='$username', Employee_id='$E_id', Email='$email',role='$res' WHERE Employee_id='$E_id'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
   
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
}

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
                    <h3 class="content-header-title">Edit User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
 <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-6 main">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
              <div class="panel panel-info">
  <div class="panel-heading" style="text-align: center;">
                <img src="-_Edit_User_Account-128.png" style="width: 15%; border-radius: 10%;">
                <h3 class="panel-title">Edit Account </h3>
                </div>
                <div class="panel-body">
                  <div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>'.$value.'</div>';
                         }
                       }?>
                    </div>  
                    
  <form action="" method="POST">
    <label class="control-label col-sm-3" for="username">username: </label> <input  type="text" placeholder="search by user name" name="id">
      <button type="submit" name="search"><i class="las la-search" ></i></button>
  </form><br>
  <?php


if (isset($_POST['search'])) {
  $id=$_POST['id'];

  $query5="SELECT * FROM user WHERE username='$id'";
  $query5_run = mysqli_query($con,$query5);
  while ($row = mysqli_fetch_array($query5_run)) {
    ?>
    <form class="form-horizontal" action="" method="POST">
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">username:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="username" value="<?php echo $row['username']?>">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Emoloyee Id:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="E_id" value="<?php echo $row['Employee_id']?>" readonly>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="email" value="<?php echo $row['Email']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php echo $row['password']?>" readonly>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="res">Role:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="role" value="<?php echo $row['role']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                             <center> <button type="submit" name="Update" class="btn btn-success" onclick="return checkDelete()"><i class="glyphicon glyphicon-update"></i>Edit User</button></center>
                          </div>
                        </div>


                     
                    </form>
    <?php
  }
}
  ?>




                      </div>
          </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->
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