<?php 
require_once('assets/constants/config.php');


 session_start();
if(isset($_SESSION['username'])){
	    
               header('location: supplier/request.php');
       
}

$errors=array();
if (isset($_POST['loginSK'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  if (empty($username)||empty($password)) {
   
  }
  else{
    $sql="SELECT * FROM supplier WHERE username='$username'";
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result)==1) {
    $query = "SELECT * FROM supplier WHERE username= '$username' and Contact='$password'"; 
    $results = mysqli_query($con, $query); 
    if (mysqli_num_rows($results) == 1) { 
      $_SESSION['username'] = $username; 
      $_SESSION['success'] = "You have logged in!";
  
               header('location:supplier/request.php');
    } 
   
    else {      
      array_push($errors, "Username or your phone number incorrect"); 
    }}
    else
    {
      $errors[]="username doesnot exist";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Page</title>
<link rel="shortcut icon" type="image/x-icon" href="">
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="w3.css"> 
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
    <!-- //Meta-Tags -->
    
    <!-- css files -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //css files -->
    
    <!-- google fonts -->
    
        <link rel="stylesheet" type="text/css" href="assets/admin/css/bootstrap.css">
    <!-- //google fonts -->
    <style>
        .alert-warning {
    border-color: #FF9149!important;
    background-color: #FFBC90!important;
    color: #963B00!important;
}
.alert {
    position: relative;
}
.mb-2, .my-2 {
    margin-bottom: 1.5rem!important;
}
.alert {
    padding: .75rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.circular--square {
  border-top-left-radius: 50% 50%;
  border-top-right-radius: 50% 50%;
  border-bottom-right-radius: 50% 50%;
  border-bottom-left-radius: 50% 50%;
}
    .main {
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    </style>
</head>
<body>
  <div class="site-wrap">

    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <P class="logo">
            <P class="site-logo">
      
              <a href="index.html" class="js-logo-clone" style="color: green">Gelead Pharmacy</a>
            </P>
          </P>
          <div  class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li ><a href="index.php" class="w3-bar-item w3-button">Home</a></li>
            <li ><a href="about.php" class="w3-bar-item w3-button">About Us</a></li>
               
                
                <li><a href="contact.html" class="w3-bar-item w3-button">Contact Us</a></li>
                <li class="has-children">
                  <a href="#">Login<i class="las la-caret-down"></i></a>
                  <ul class="dropdown">
                    <li><a href="login.php">Employee</a></li>
                    <li><a href="loginsupplier.php">Supplier</a></li>
                    
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
<br>
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="">Login</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Supplier</strong></div>
        </div>
      </div>
   
<div class="">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            
            
              <div class="col-md-6 col-md-offset-4 " style="margin: 7em auto;">
            <div class="card main" >
              <div class="card-heading" style="text-align: center; background-color: MediumSeaGreen;">
                <img src="admin/facebook_profile_image.png" class="circular--square" style="width:30%" >
                <h3 class="card-title">please sign in </h3>
                </div>
                <div class="card-body">
                    <div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i> '.$value.'</div>';
                         }
                       }?>
                    </div>
                
             
                <form class="form-horizontal" action="" method="POST" >
                    <label>User Name</label>
                    <div class="input-group">
                        <span class="fa fa-user" aria-hidden="true"></span>
                        <input type="text" name="username" placeholder="Enter your Username" required=""> 
                    </div>
                    <label>Phone Number</label>
                    <div class="input-group">
                        <span class="fa fa-phone" aria-hidden="true"></span>
                        <input type="text" name="password" placeholder="Enter your phone number" required="">
                    </div>
               <center>
                 <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-11">
                               <button type="submit" class="btn btn-warning" name="loginSK"><i class="las la-arrow-alt-circle-right"></i>Login</button> 
                          </div>
                        </div>
               </center>
                        </div>

                    </form>
                </div>
            </div>
          </div>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- footer -->
    <div class="footer">
    </div>

    <!-- footer -->
</div>
    
</body>
</html>