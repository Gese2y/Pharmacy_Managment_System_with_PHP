<?php
$errors='';
?><!DOCTYPE html>
<html>
<head>
  <title></title>
   </script>
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
        width: 1000px;
        height: 800px;
    </style>
</head>
<body>
<div class="signupform">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <h1>Gelead Pharmacy Main Login page</h1>
                    
                    <img src="assets/images/facebook_profile_image.png" alt="" />
                    
                </div>
            </div>
            
              <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-info">
              <div class="panel-heading" style="text-align: center;">
                <img src="admin/facebook_profile_image.png" class="circular--square" style="width:30%" >
                <h3 class="panel-title">please sign in </h3>
                </div>
                <div class="panel-body">
                    <div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i> '.$value.'</div>';
                         }
                       }?>
                    </div>
                
             
                <form class="form-horizontal" action="" method="POST" >
    
                  <div class="form-group">
                         <label class="control-label col-sm-3" for="username">username:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="Enter email" name="username">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                      </div>
                      <div class="form-group">
                            <div class="col-sm-10">
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                      </div>
               <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-11">   <a href="LoginMana.php" class="btn btn-info" role="button">mana</a> 
                              <a href="LoginPhar.php" class="btn btn-info" role="button">pharm</a>  
                              
                              <button type="submit" class="btn btn-info muker" name="loginSK"><i class="glyphicon glyphicon-log-in" value="login " ></i>storek</button> 
                              <a href="LoginSA.php"  class="btn btn-info" role="button">symA</a>
                          </div>
                        </div>

                    </form>
                </div>
            </div>
          </div>
            </div>
        </div>
        <!-- //main content -->
    </div>
</body>
</html>