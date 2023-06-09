<?php
require_once('../assets/constants/config.php');
include('../header/SKheader.php');

$errors=array();


 
if ($_POST) {
  $cat_id=$_POST['cat_id'];
  $cat_name=$_POST['cat_name'];
  $dir=$_POST['dir'];
  $Description=$_POST['Description'];

   $IsItd="INSERT INTO `category`(`Category_id`, `Catagory_name`, `Description`, `direction`) VALUES ('$cat_id','$cat_name','$Description','$dir')";
$resultItd=mysqli_query($con,$IsItd);
       if ($resultItd===true) {
   
     } else {
      
      $errors[]= "check your enserted item id, that must be unique";
    }
      







}
$queryid = "SELECT * FROM `user`";

// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);

$options = "";

$queryCat="SELECT * FROM `category`";
$resultcat=mysqli_query($con,$queryCat);


while($rowid = mysqli_fetch_array($resultcat))
{
    $options = $options."<option value='$rowid[3]'>$rowid[3]</option>";
}

?>
<br>
<div style="text-align: center;">

</div>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Category</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Category
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
                        <div class="col-md-6" style="margin: 0em auto;">
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
                <img src=" Medicine-14-128.png" style="width: 10%; border-radius: 10%;">
                <h3 class="panel-title">Add Category </h3>
                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" novalidate>
                                              <div class="form-row">
   
  <div class="form-group col-md-4">
     <h5>Category Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="cat_id" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>                          
                            
    <div class="form-group col-md-4">
      <h5>Category Name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="cat_name" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>
    <div class="form-group col-md-4">
      <h5>Direction <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="dir" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>
  
  </div>
 <div><h5>Description </h5>
                                                        <div class="controls">
                                                            <textarea name="Description" class="form-control mb-1" placeholder="Description" rows="10" ></textarea>
                                                        </div>
    </div>
  </div>


                <div class="form-group row">
                  <center><div class="col-sm-offset-2 col-sm-3">
                    <input type="submit" class="btn btn-success" value="ADD">
                  </div>
                  </center>
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
<?php


?>
    <?php include 'footer.php'; ?>