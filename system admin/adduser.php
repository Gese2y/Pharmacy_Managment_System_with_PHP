<?php
require_once('../assets/constants/config.php');

include('../header/SAheader.php');


$errors=array();


  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='System Admin')";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) { 
    if ($_POST) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  $incryptedpas=md5($password);
  $E_id=$_POST['E_id'];
  $email=$_POST['email'];
 $Erole="SELECT Role,First_name,  Last_name FROM Employee WHERE Employee_id='$E_id' ";
     $resultt = $con->query($Erole);
     if ($resultt ->num_rows > 0) {
      $row = $resultt->fetch_array();
      $res=$row['Role'];
   // user full name retrival to register who registers the users   
$sqlReg = "SELECT role,Employee_id FROM user WHERE username='$Gname'";
$regRes = $con->query($sqlReg);
if ($regRes ->num_rows > 0) {
  $row1 = $regRes->fetch_array();
  $res1=$row1['role'];
  $resId=$row1['Employee_id'];
  $regrole="SELECT First_name,  Last_name FROM Employee WHERE Role='$res1' AND Employee_id='$resId' ";
  $resReg=$con->query($regrole);
  if ($resReg ->num_rows > 0) {
      $row2 = $resReg->fetch_array();
      
      $nameRe=$row2['First_name']." ".$row2['Last_name'];


      }

}
// end

      }

    $sql="SELECT * FROM Employee WHERE Employee_id='$E_id'";
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result)==1) {
      $sqlm = "INSERT INTO user (username, Employee_id, Email,password, role,registrar)
       VALUES ('$username', '$E_id', '$email','$incryptedpas ','$res','$nameRe')";
       $resultm=mysqli_query($con,$sqlm);

      if ($resultm===true) {
   
     } else {
      echo "Error: " . $sqlm . "<br>" . mysqli_error($con);
    }
    }else
    {
      $errors[]="Employee Id doesnot exist";
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
                    <h3 class="content-header-title">Add User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add User
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
                <img src="-_Manage_Account_Create-128.png" style="width: 15%; border-radius: 10%;">
                <h3 class="panel-title">Create Account </h3>
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
                
             
                   <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">username:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Emoloyee Id:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="E_id">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="email">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success"><i class="las la-plus" value="login"></i></i> Create Account</button>
                          </div>
                        </div>
                    </form>
                </div>
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