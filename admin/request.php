<?php
require_once('../assets/constants/config.php');

include('../header/SKheader.php');

$errors=array();

    if ($_POST) {
        $today=date('y-m-d');
  $reqid=$_POST['reqid'];
  $title=$_POST['title'];
  $from=$_POST['from'];
  $email=$_POST['email'];
  $sent_to=$_POST['sent_to'];
  $content=$_POST['content'];
  $telephone=$_POST['telephone'];

       $sqlm = "INSERT INTO request (request_id, sent_from, contact, email, sent_to, title, content, sent_date, status) VALUES ('$reqid','$from','$telephone','$email','$sent_to','$title','$content','$today','')";
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
            <div class="content-header value mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Request</h3>
                    <div class="value breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Sent Request
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
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                         <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Request Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="reqid" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Title <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>From <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="from" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Telephone <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="telephone" class="form-control mb-1" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-6 col-md-12">

                                                    <div class="form-group">
                                                        <h5>Email Address <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="email" class="form-control mb-1" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Sent To </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <select  data-live-search="true" name="sent_to"  class="form-control mb-1 select2" required data-validation-required-message="Supplier Name is Required">
                                                                <option>select user..</option>
                                                                <option value="manager">To manager</option>
                                                                <option value="storekeeper">To store keeper</option>
                                                                <option value="pharmacist">To pharmacist</option>
                                                                <option value="supplier">To supplier</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                        <h5>content <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="content" class="form-control mb-1"  required placeholder="" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               <button type="submit" class="btn btn-success"><i class="las la-plus" value="login"></i></i> Create Account</button>  
                                            </div>
                                            
  
 
</form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php include 'footer.php'; ?>

<script>

    function checkDelete() {
      return confirm('are you sure delete user data','#E74C3C');
    }
  </script>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>