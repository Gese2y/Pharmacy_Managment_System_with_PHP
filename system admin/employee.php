   
<?php
require_once('../assets/constants/config.php');

include('../header/SAheader.php');
    if ($_POST) {
  $E_id=$_POST['E_id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $role=$_POST['role'];
  $sallary=$_POST['sallary'];
  $branch=$_POST['branch'];

   $imgFile = $_FILES['image']['name'];
 $tmp_dir = $_FILES['image']['tmp_name'];
 $imgSize = $_FILES['image']['size']; 
 
 if(!empty($imgFile))
 {

 $upload_dir = 'image/'; // upload directory
 
 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
 
 // valid image extensions
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
 
 // rename uploading image
 $coverpic = rand(1000,1000000).".".$imgExt;
 
 // allow valid image file formats
 if(in_array($imgExt, $valid_extensions)){ 
 // Check file size '5MB'
 if($imgSize < 5000000) {
 move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
 }
 else{
 $errMSG = "Sorry, your file is too large.";
 }
 }
 else{
 $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
 }

//For Database Insertion
 // if no error occured, continue ....

 

 }

 $sqlm = " INSERT INTO `employee`(`Employee_id`, `First_name`, `Last_name`, `Gender`, `Age`, `Address`, `Contact`, `Email_address`, `Role`, `Sallarry`, `work_place`, `photo`) 
       VALUES ('$E_id', '$fname', '$lname','$gender','$age','$address','$contact','$email','$role','$sallary','$branch','$coverpic')";
       $resultm=mysqli_query($con,$sqlm);

      if ($resultm===true) {
   
     } else {
      echo "Error: " . $sqlm . "<br>" . mysqli_error($con);
    }

  }
  $queryid = "SELECT * FROM `branch`";

// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);
 ?>
 <style type="text/css">
     .main {
       
        margin: 0em auto;
</style>
   <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Employee</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Employee
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
                <h3 class="panel-title">Register Employee </h3>
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
                
             
                   <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">Employee Id:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="Employee id" name="E_id" required="">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">First Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="First Name" name="fname" required="">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Last Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="Last Name" name="lname" required="">
                            </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">Gender:</label>
                           <div class="col-sm-10">
                             <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female
  <input type="radio" name="gender" value="other"> Other
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Age:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="age" name="age" required="">
                            </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">Addresss:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="address" name="address" required="">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Contact No:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="contact" name="contact" required="">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Email Address:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="pwd" placeholder="Email Address" name="email" required="">
                            </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-sm-3" for="username">Work Position:</label>
                           <div class="col-sm-10">
                             <div class="controls">
                                                            <div class="input-group">
                                                                <select  data-live-search="true" name="role"  class="form-control mb-1 select2" required data-validation-required-message="Supplier Name is Required">
                                                                <option value="Store Keeper">Store Keeper</option>
                                                                <option value="Pharmacist">Pharmacist</option>
                                                                <option value="System Admin"> System Admin</option>
                                                                <option value="Manager">Manager</option>
                                                            </select>
                                                            </div>
                                                        </div>
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Sallary:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="sallary" name="sallary" required="">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Work Place:</label>
                            <div class="col-sm-10">
                                <div class="controls">
                                                            <div class="input-group">
                                                                <select  data-live-search="true" name="branch"  class="form-control mb-1 select2" required data-validation-required-message="Supplier Name is Required">
                                                                <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
                                                                <option value="<?php echo $rowid1[1];?>"> <?php echo $rowid1[1];?></option>

                                                                    <?php endwhile;?>
                                                            </select>
                                                            </div>
                                                        </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Photo:</label>
                            <div class="col-sm-10">
                                                            <input type="file" name="image" class="form-control" required="">
                                                                                                    
                                                    
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success"><i class="las la-plus" value="login"></i></i> Register</button>
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
                <?php include 'footer.php'; ?>