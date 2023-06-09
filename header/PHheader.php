<?php
include('checkexpire.php');
 session_start();
 if (!isset($_SESSION['username'])) { 
  $_SESSION['msg'] = "You have to log in first"; 
   header('location: ../index.php');

}
$errors=array();
$Gname= $_SESSION['username'];
  $sqlUs1 = "SELECT role,Employee_id FROM user WHERE username='$Gname'";
$reUs1 = $con->query($sqlUs1);
if ($reUs1 ->num_rows > 0) {
  $row122 = $reUs1->fetch_array();
  $res22=$row122['role'];
  $resId1=$row122['Employee_id'];
  $regUser1="SELECT * FROM Employee WHERE Role='$res22' AND Employee_id='$resId1' ";
  $resUs1=$con->query($regUser1);
  if ($resUs1 ->num_rows > 0) {
      $row211 = $resUs1->fetch_array();
      $Branch=$row211['work_place'];
      $nameUs1=$row211['First_name']." ".$row211['Last_name'];
      }}

 
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title></title>
    <link href="../assets/material.css" rel="stylesheet">
    <link href="../assets/BodyText.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.css">
    
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
    <style type="text/css">
        .background1 {
box-sizing: border-box;
width: 100%;
height: 50px;
}
.btn-circle{
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.33px;
    border-radius: 15px;
    }
        .btn-circle2{
    width: 20px;
    height: 20px;
    text-align: center;
    padding: 6px 0;
    font-size: 10px;
    line-height: 1.33px;
    border-radius: 10px;
    }
    </style>

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
                    <li class="nav-item"><a class="navbar-brand" href="">
                            <h1 class="brand-text" style="color: green"> <b> <?php echo $Branch.": ";?><small><b><?php echo $res22;?></b></small></h1></b>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"></i></a>
                            <div class="search-input"><b><h1 class="brand-text" style="color: green"> Gelead Pharmacy</h1></b>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <i></i> <span class="mr-1 user-name text-bold-700"><?php echo $nameUs1;?>
                </span><span class="avatar avatar-online" > <img src="logo.png" class="circular--square" style="width:50px" ><i></i>
                        
                        </span></a>

                            <div class="dropdown-menu dropdown-menu-right"><i>
                                
                            </i><a class="dropdown-item" href="account"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

<?php $h='home';?>

    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper" >
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav navbar-right" id="main-menu-navigation" data-menu="menu-navigation" >
               
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="sale"><i class="la la-rupee"></i><span>Sales</span></a></li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="view_category"><i class="las la-sitemap"></i><span> Category</span></a></li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="las la-edit"></i><span>Manage Item</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="editmedicine" data-toggle=""><i class="la la-edit"></i><span>Update Item Info</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="deletemedicine" data-toggle=""><i class="la la-archive"></i><span>Delete Item </span></a>
                        </li>                        
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="las la-eye"></i><span>View Store Status</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="<?php echo $h;?>" data-toggle=""><i class="las la-home"></i><span>stat</span></a>
                        <li data-menu=""><a class="dropdown-item" href="avilable_item" data-toggle=""><i class="las la-calendar-check"></i><span>Avialable Item</span></a>
                        <li data-menu=""><a class="dropdown-item" href="low_item" data-toggle=""><i class="las la-calendar-minus"></i><span>Low item</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="expired_item" data-toggle=""><i class="las la-exclamation-triangle"></i><span>Expired Item</span></a>
                        </li>>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="las la-chart-bar"></i><span>View Transaction Status</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="vieTraStat" data-toggle=""><i class="las la-square-full"></i><span>All Transaction</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="soldtomany" data-toggle=""><i class="las la-square-full"></i><span>Sold To many</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="slightly" data-toggle=""><i class="las la-minus-square"></i><span>Slightly siold</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="neversold" data-toggle=""><i class="las la-door-closed"></i><span>Never Sold</span></a>
                        </li>>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="las la-envelope"></i><span>Request</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="view_request" data-toggle=""><i class="las la-envelope-open-text"></i><span>View Request</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="request" data-toggle=""><i class="las la-file-alt"></i><span>Send Request</span></a>
                        </li>
                    </ul>
                </li> 
                 
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-bell"></i><span>Alert <?php 
                  $Ex="SELECT `alert_no`, count(alert_no) as ExValue from `alert2` where status not like '%$Gname%'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres); ?><button class="btn btn-danger btn-circle">(<?php echo $rEx['ExValue']; ?>)</button></span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="exalert" data-toggle=""><span>Expired Item <?php 
                  $Ex="SELECT `alert_no`, count(alert_no) as ExValue from `alert2` where alert_title='expired_item' and status not like '%$Gname%'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres); ?><button class="btn btn-danger btn-circle2">(<?php echo $rEx['ExValue']; ?>)</button></span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="lalert" data-toggle=""></i><span>Low Item <?php 
                  $Ex="SELECT `alert_no`, count(alert_no) as ExValue from `alert2` where alert_title='low_item' and status not like '%$Gname%'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres); ?><button class="btn btn-danger btn-circle2">(<?php echo $rEx['ExValue']; ?>)</button></span></a>
                        </li>>
                        <li data-menu=""><a class="dropdown-item" href="ualert" data-toggle=""><span>Unavialable Item <?php 
                  $Ex="SELECT `alert_no`, count(alert_no) as ExValue from `alert2` where alert_title='unavilable_item' and status not like '%$Gname%'";
                  $Exres=mysqli_query($con,$Ex);
                  $rEx=mysqli_fetch_array($Exres); ?><button class="btn btn-danger btn-circle2">(<?php echo $rEx['ExValue']; ?>)</button></span></a>
                        </li>>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->