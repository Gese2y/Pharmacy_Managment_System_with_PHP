<?php
require_once('../assets/constants/config.php');


 $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * from `item` where item_id='$id'");
  $row=mysqli_fetch_array($query);
if (isset($_POST['Update'])) {
$Cat_Id=$_POST['Cat_Id'];
$It_Id=$_POST['It_Id'];
  $It_Na=$_POST['It_Na'];
  $quan=$_POST['quan'];
  $Un=$_POST['Un'];
  $It_Pr=$_POST['It_Pr'];
  $Pr_Da=$_POST['Pr_Da'];
  $Ex_Da=$_POST['Ex_Da'];
  $En_Da=$_POST['En_Da'];
  $Sh_No=$_POST['Sh_No'];
  $Su_Id=$_POST['Su_Id'];
  $Coun=$_POST['Coun'];

if (empty($Cat_Id)||empty($It_Id)||empty($It_Na)||empty($Coun)) {
    if ($Cat_Id=="") {
      $errors[]="username is required";
    }
    if ($It_Na=="") {
      $errors[]="password is required";
    }
     if ($It_Id=="") {
      $errors[]="Employee Id is required";
    }
     if ($Coun=="") {
      $errors[]="Email Address is required";
    }
  }
  $sqlup="UPDATE item SET  item_id='$It_Id', Catagory_id='$Cat_Id', Item_name='$It_Na',unit='$Un',Quantity='$quan', Item_price='$It_Pr', Country='$Coun', Produced_Date='$Pr_Da', Expired_date='$Ex_Da', Entered_date='$En_Da', Shelf_no='$Sh_No', Supplier_id='$Su_Id' where item_id='$id'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
     } else {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
    header("Location:suppliers.php");

}


?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title></title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/selects/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/extensions/sweetalert.css">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo"  src="fevicon-179.png">
                            <h3 class="brand-text">Admin</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern...">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"></span><span class="avatar avatar-online">
                            
                        <img src="../assets/admin/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i>
                         <img  class="img-crop" src="../assets/uploads/avatar/'.$myvataor.'" alt="avatar" >';
                        
                        </span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="account"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper" >
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav navbar-right" id="main-menu-navigation" data-menu="menu-navigation" >
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="index.php"><i class="la la-home"></i><span>Dashboard</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-medkit"></i><span>Medicinals</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="manage" data-toggle=""><i class="la la-edit"></i><span>Manage</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="manage?out=1" data-toggle=""><i class="la la-archive"></i><span>Out Stock</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="manage?expired=1" data-toggle=""><i class="la la-exclamation-circle"></i><span>Expired</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="pos"><i class="la la-money"></i><span>POS</span></a>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="sales"><i class="la la-rupee"></i><span>Sales</span></a>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="categories"><i class="la la-tags"></i><span>Categories</span></a>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="suppliers"><i class="la la-truck"></i><span>Suppliers</span></a>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="customers"><i class="la la-users"></i><span>Customers</span></a>
                </li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="users"><i class="la la-user-plus"></i><span>Users</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-medkit"></i><span>Reports</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="sales_report" data-toggle=""><i class="la la-edit"></i><span>Sales Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="purchase_report" data-toggle=""><i class="la la-archive"></i><span>Purchase Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="customer_report" data-toggle=""><i class="la la-group"></i><span>Customer Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="purchase_report?expired=1" data-toggle=""><i class="la la-exclamation-circle"></i><span>Purchase Expiry Report</span></a>
                        </li>
                    </ul>
                </li>
                <?php echo "granted user";?>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="settings.php"><i class="la la-cogs"></i><span>Settings</span></a>
                </li>
                <?php  ?>

            </ul>
        </div>
    </div>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Edit Supplier</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Supplier
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
                        <div class="col-md-12">
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
                                        
                <form class="form-horizontal" action="" method="POST">
                      <div class="form-group">
                         <label class="control-label col-sm-3" for="username">Catagory Id:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="Cat_Id" value="<?php echo $row['Catagory_id']?>">
                            </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-sm-3" for="username">Item Id:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="It_Id" value="<?php echo $row['item_id']?>">
                            </div>
                        </div>
                        
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Item Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="It_Na" value="<?php echo $row['Item_name']?>" >
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">unit:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="Un" value="<?php echo $row['unit']?>" >
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Quantity:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="quan" value="<?php echo $row['Quantity']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Item price:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="It_Pr" value="<?php echo $row['Item_price']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Produced Date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="Pr_Da" value="<?php echo $row['Produced_Date']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Expired date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="Ex_Da" value="<?php echo $row['Expired_date']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Entered date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="En_Da" value="<?php echo $row['Entered_date']?>">
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Country:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Coun" value="<?php echo $row['Country']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Shelf Number:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Sh_No" value="<?php echo $row['Shelf_no']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="res">Supplier Id:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="Su_Id" value="<?php echo $row['Supplier_id']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-8">
                              <center><button type="submit" name="Update" class="btn btn-success"><i class="glyphicon glyphicon-update"></i>Update Account</button></center>
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
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'footer.php'; ?>