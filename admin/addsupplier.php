 <?php
require_once('../assets/constants/config.php');
include('../header/SKheader.php');

$errors=array();

    if ($_POST) {
        $today=date('y-m-d');
  $sup_id=$_POST['id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $uname=$_POST['uname'];
  $org=$_POST['organization'];
  $address=$_POST['address'];
  $telephone=$_POST['telephone'];
  $homephone=$_POST['homephone'];

       $sqlm = "INSERT INTO supplier (Supplier_id, First_Name, Last_name, username, Address, Contact, home_phone, organization_name, added_date, Regiterd_by) VALUES ('$sup_id','$fname','$lname','$uname','$address','$telephone','$homephone','$org','$today',' $nameUs1')";
       $resultm=mysqli_query($con,$sqlm);

      if ($resultm===true) {
   
     } else {
      echo "Error: " . $sqlm . "<br>" . mysqli_error($con);
    }


  }


?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Add Supplier</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Supplier
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
                        <div class="col-md-8" style="margin: 0em auto;">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-heading" style="text-align: center;">
                <img src=" add_3-128.png" style="width: 10%; border-radius: 10%;">
                <h3 class="panel-title">Register Supplier </h3>
                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Supplier Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="id" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>First name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Last name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="lname" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>User Name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="uname" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-6 col-md-12">

                                                    <div class="form-group">
                                                        <h5>Organization Name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="organization" class="form-control mb-1" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Address <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control mb-1" required data-validation-required-message="Address is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Telephone <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="telephone" class="form-control mb-1" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Home Phone <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="homephone" class="form-control mb-1" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus" value="login"></i></i> Create Account</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->
            </div>
        </div>
    </div>

    <!-- END: Content-->

    <?php include 'footer.php'; ?>